<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Search extends BaseController
{
    public function index()
    {
        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Set JSON response headers
        $this->response->setHeader('Content-Type', 'application/json');
        $this->response->setHeader('Access-Control-Allow-Origin', '*');

        // Get query
        $query = $this->request->getGet('q');
        log_message('debug', 'Search called with query: ' . $query);

        // Check admin login - TEMPORARILY BYPASSED FOR TESTING
        $isAdmin = true; // Remove this after testing
        // $isAdmin = session()->get('admin_logged_in');

        if (!$isAdmin) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Unauthorized access'
            ])->setStatusCode(403);
        }

        $query = trim($query);

        if (strlen($query) < 2) {
            return $this->response->setJSON([
                'status' => true,
                'results' => []
            ]);
        }

        try {
            $results = $this->searchAllContent($query);
            $results = array_slice($results, 0, 30);

            return $this->response->setJSON([
                'status' => true,
                'results' => $results,
                'total' => count($results)
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Search error: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Search error: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    private function searchAllContent($query)
    {
        $results = [];
        $queryLower = strtolower($query);

        // =============================================
        // 1. SEARCH ALL STATIC PAGES
        // =============================================
        $allPages = $this->getAllPages();
        
        foreach ($allPages as $page) {
            // Search in title
            $titleLower = strtolower($page['title']);
            $contentLower = strtolower($page['content']);
            
            if (strpos($titleLower, $queryLower) !== false || 
                strpos($contentLower, $queryLower) !== false) {
                
                // Find the snippet where the query appears
                $snippet = $this->getSnippet($page['content'], $query);
                
                $results[] = [
                    'type' => 'page',
                    'title' => $page['title'],
                    'description' => $snippet ?: 'Found in page content',
                    'url' => $page['url'],
                    'icon' => $page['icon'] ?? 'fa-file-text-o',
                    'module' => 'Page',
                    'match' => 'static'
                ];
            }
        }

        // =============================================
        // 2. SEARCH DATABASE TABLES
        // =============================================
        $db = db_connect();

        // Search MLA
        if ($db->tableExists('mla')) {
            try {
                $builder = $db->table('mla');
                $builder->like('mla_name', $query);
                $builder->orLike('constituency', $query);
                $builder->orLike('district', $query);
                $builder->orLike('party', $query);
                $builder->limit(5);
                $records = $builder->get()->getResultArray();
                
                foreach ($records as $record) {
                    $title = $record['mla_name'] ?? 'MLA Record';
                    $desc = 'Constituency: ' . ($record['constituency'] ?? 'N/A') . 
                            ' | District: ' . ($record['district'] ?? 'N/A');
                    $results[] = [
                        'type' => 'database',
                        'title' => $title,
                        'description' => $this->getSnippet($desc, $query),
                        'url' => base_url('admin/mla-management'),
                        'icon' => 'fa-user',
                        'module' => 'MLA'
                    ];
                }
            } catch (\Exception $e) {
                log_message('error', 'MLA search error: ' . $e->getMessage());
            }
        }

        // Search Constituency
        if ($db->tableExists('constituencies')) {
            try {
                $builder = $db->table('constituencies');
                $builder->like('constituency_name', $query);
                $builder->orLike('district', $query);
                $builder->orLike('region', $query);
                $builder->limit(5);
                $records = $builder->get()->getResultArray();
                
                foreach ($records as $record) {
                    $title = $record['constituency_name'] ?? 'Constituency';
                    $desc = 'District: ' . ($record['district'] ?? 'N/A');
                    $results[] = [
                        'type' => 'database',
                        'title' => $title,
                        'description' => $this->getSnippet($desc, $query),
                        'url' => base_url('admin/constituency-management'),
                        'icon' => 'fa-map-marker',
                        'module' => 'Constituency'
                    ];
                }
            } catch (\Exception $e) {
                log_message('error', 'Constituency search error: ' . $e->getMessage());
            }
        }

        // Search Complaints
        if ($db->tableExists('complaints')) {
            try {
                $builder = $db->table('complaints');
                $builder->like('title', $query);
                $builder->orLike('description', $query);
                $builder->orLike('category', $query);
                $builder->orLike('location', $query);
                $builder->limit(5);
                $records = $builder->get()->getResultArray();
                
                foreach ($records as $record) {
                    $title = $record['title'] ?? 'Complaint #' . ($record['id'] ?? '');
                    $results[] = [
                        'type' => 'database',
                        'title' => $title,
                        'description' => $this->getSnippet($record['description'] ?? '', $query),
                        'url' => base_url('admin/complaint-management'),
                        'icon' => 'fa-exclamation-circle',
                        'module' => 'Complaints'
                    ];
                }
            } catch (\Exception $e) {
                log_message('error', 'Complaint search error: ' . $e->getMessage());
            }
        }

        // Search Feedback
        if ($db->tableExists('feedback')) {
            try {
                $builder = $db->table('feedback');
                $builder->like('category', $query);
                $builder->orLike('description', $query);
                $builder->orLike('village', $query);
                $builder->orLike('constituency', $query);
                $builder->limit(5);
                $records = $builder->get()->getResultArray();
                
                foreach ($records as $record) {
                    $title = 'Feedback - ' . ($record['category'] ?? 'General');
                    $results[] = [
                        'type' => 'database',
                        'title' => $title,
                        'description' => $this->getSnippet($record['description'] ?? '', $query),
                        'url' => base_url('admin/feedback-dashboard'),
                        'icon' => 'fa-comments',
                        'module' => 'Feedback'
                    ];
                }
            } catch (\Exception $e) {
                log_message('error', 'Feedback search error: ' . $e->getMessage());
            }
        }

        // Search Rating Questions
        if ($db->tableExists('rating_questions')) {
            try {
                $builder = $db->table('rating_questions');
                $builder->like('question', $query);
                $builder->orLike('category', $query);
                $builder->limit(5);
                $records = $builder->get()->getResultArray();
                
                foreach ($records as $record) {
                    $title = $record['question'] ?? 'Rating Question';
                    $results[] = [
                        'type' => 'database',
                        'title' => $title,
                        'description' => $this->getSnippet($record['question'] ?? '', $query),
                        'url' => base_url('admin/ratingquestion'),
                        'icon' => 'fa-star',
                        'module' => 'Rating Questions'
                    ];
                }
            } catch (\Exception $e) {
                log_message('error', 'Rating question search error: ' . $e->getMessage());
            }
        }

        // Remove duplicates
        $uniqueResults = [];
        $seen = [];
        foreach ($results as $result) {
            $key = $result['title'] . '|' . $result['type'];
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $uniqueResults[] = $result;
            }
        }

        return $uniqueResults;
    }

    private function getAllPages()
    {
        // =============================================
        // COMPLETE LIST OF ALL PAGES ON THE WEBSITE
        // ADD ALL YOUR PAGES HERE
        // =============================================
        return [
            // Home Page
            [
                'title' => 'Home',
                'content' => 'Welcome to MLA Web Portal. Home page with information about MLAs, constituencies, and public services. Districts, constituencies, and MLA information available.',
                'url' => base_url('/'),
                'icon' => 'fa-home'
            ],
            
            // Leadership Page
            [
                'title' => 'Leadership',
                'content' => 'Leadership information, MLA performance rankings, evaluation, and leaderboard. Details about district leadership and constituency representatives.',
                'url' => base_url('leadership'),
                'icon' => 'fa-trophy'
            ],
            
            // MLA Page
            [
                'title' => 'MLA Information',
                'content' => 'Know Your MLA - Complete information about elected representatives. MLA details, contact information, constituency, development work, and public services. District and constituency information.',
                'url' => base_url('mla'),
                'icon' => 'fa-user-circle'
            ],
            
            // User Dashboard
            [
                'title' => 'User Dashboard',
                'content' => 'User dashboard with MLA rating, complaints, feedback, and surveys. Rate your MLA and provide feedback on their performance.',
                'url' => base_url('user/dashboard'),
                'icon' => 'fa-dashboard'
            ],
            
            // MLA Rating
            [
                'title' => 'MLA Rating',
                'content' => 'Rate your MLA on various parameters including development work, accessibility, and public service delivery. District-wise and constituency-wise ratings.',
                'url' => base_url('user/mla-rating'),
                'icon' => 'fa-star'
            ],
            
            // Complaint
            [
                'title' => 'Report Complaint',
                'content' => 'File complaints about local issues, infrastructure problems, and public services. Categories include roads, water supply, electricity, and sanitation. District and constituency-specific complaints.',
                'url' => base_url('user/complaint'),
                'icon' => 'fa-exclamation-triangle'
            ],
            
            // Feedback
            [
                'title' => 'Submit Feedback',
                'content' => 'Share feedback about MLA performance, public services, and community development. Feedback on roads, infrastructure, health, education, and women safety.',
                'url' => base_url('user/feedback'),
                'icon' => 'fa-comment-o'
            ],
            
            // MLA Works
            [
                'title' => 'MLA Works',
                'content' => 'View development works and projects by your MLA. Infrastructure projects, road development, water supply, and public works in your constituency and district.',
                'url' => base_url('user/mla-works'),
                'icon' => 'fa-building'
            ],
            
            // Surveys
            [
                'title' => 'Surveys',
                'content' => 'Participate in surveys and public opinion polls. Surveys about MLA performance, development works, and public services. District and constituency surveys.',
                'url' => base_url('user/survey'),
                'icon' => 'fa-bar-chart'
            ],
            
            // Admin Dashboard
            [
                'title' => 'Admin Dashboard',
                'content' => 'Admin dashboard with overview of MLA management, constituency management, complaints, feedback, surveys, and voter management. Districts and constituencies management.',
                'url' => base_url('admin/dashboard'),
                'icon' => 'fa-dashboard'
            ],
            
            // MLA Management (Admin)
            [
                'title' => 'MLA Management',
                'content' => 'Manage MLA information including name, constituency, district, party, and designation. Add, edit, and delete MLA records. Manage district and constituency information.',
                'url' => base_url('admin/mla-management'),
                'icon' => 'fa-users'
            ],
            
            // Constituency Management (Admin)
            [
                'title' => 'Constituency Management',
                'content' => 'Manage constituency details including constituency name, district, region, and description. Manage districts and constituencies mapping.',
                'url' => base_url('admin/constituency-management'),
                'icon' => 'fa-map-marker'
            ],
            
            // Complaint Management (Admin)
            [
                'title' => 'Complaint Management',
                'content' => 'Manage complaints filed by citizens. View and update complaint status, category, location, and constituency. Manage road, water, electricity, and sanitation complaints.',
                'url' => base_url('admin/complaint-management'),
                'icon' => 'fa-exclamation-circle'
            ],
            
            // Feedback Dashboard (Admin)
            [
                'title' => 'Feedback Dashboard',
                'content' => 'View and manage feedback from voters. Feedback categories include roads, infrastructure, health, education, and women safety. District and constituency feedback.',
                'url' => base_url('admin/feedback-dashboard'),
                'icon' => 'fa-comments'
            ],
            
            // Survey Management (Admin)
            [
                'title' => 'Survey Management',
                'content' => 'Manage surveys and view responses. Survey categories, questions, and responses. District and constituency surveys.',
                'url' => base_url('admin/survey-management'),
                'icon' => 'fa-bar-chart'
            ],
            
            // Voter Management (Admin)
            [
                'title' => 'Voter Management',
                'content' => 'Manage voter information including name, village, constituency, district, and voter ID. Voter records management.',
                'url' => base_url('admin/voter-management'),
                'icon' => 'fa-user'
            ],
            
            // Rating Questions (Admin)
            [
                'title' => 'Rating Questions',
                'content' => 'Manage MLA rating questions. Rating questions about development, accessibility, public service, infrastructure, health, education, and women safety.',
                'url' => base_url('admin/ratingquestion'),
                'icon' => 'fa-star'
            ],
            
            // Notification Center (Admin)
            [
                'title' => 'Notification Center',
                'content' => 'View and manage notifications for users and admins. Notification about MLA rating, complaints, feedback, and surveys.',
                'url' => base_url('admin/notification-center'),
                'icon' => 'fa-bell'
            ],
            
            // Activity Logs (Admin)
            [
                'title' => 'Activity Logs',
                'content' => 'View system activity logs including user actions, admin actions, and system events. Activity tracking for MLA management, constituency management, and user actions.',
                'url' => base_url('admin/activity-logs'),
                'icon' => 'fa-history'
            ],
            
            // Media Library (Admin)
            [
                'title' => 'Media Library',
                'content' => 'Manage media files including images, videos, and documents. Media for MLA profiles, constituency photos, and public works.',
                'url' => base_url('admin/media-library'),
                'icon' => 'fa-picture-o'
            ]
        ];
    }

    private function getSnippet($text, $query, $length = 120)
    {
        if (empty($text)) {
            return '';
        }
        
        $text = strip_tags($text);
        $text = html_entity_decode($text);
        $pos = stripos($text, $query);
        
        if ($pos === false) {
            // If query not found in this text, return first few characters
            return substr($text, 0, $length) . '...';
        }

        $start = max(0, $pos - 50);
        $end = min(strlen($text), $pos + strlen($query) + 50);
        
        $snippet = substr($text, $start, $end - $start);
        
        if ($start > 0) {
            $snippet = '...' . $snippet;
        }
        if ($end < strlen($text)) {
            $snippet = $snippet . '...';
        }

        // Highlight the query
        $snippet = str_ireplace($query, '<strong>' . $query . '</strong>', $snippet);

        return $snippet;
    }
}