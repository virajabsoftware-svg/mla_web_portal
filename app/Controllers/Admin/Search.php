<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Search extends BaseController
{
    public function index()
    {
        // Enable error reporting for debugging
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        // Set JSON response headers
        $this->response->setHeader('Content-Type', 'application/json');
        $this->response->setHeader('Access-Control-Allow-Origin', '*');

        // Debug: Log the request
        $query = $this->request->getGet('q');
        log_message('debug', 'Search called with query: ' . $query);

        // Check admin login
        $isAdmin = session()->get('admin_logged_in');
        log_message('debug', 'Admin logged in: ' . ($isAdmin ? 'Yes' : 'No'));

        // TEMPORARY: BYPASS AUTH FOR TESTING - REMOVE THIS AFTER TESTING
        $isAdmin = true;

        if (!$isAdmin) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Unauthorized access. Please login as admin.'
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
            // Get results from all sources
            $results = $this->searchAll($query);
            
            // Limit results
            $results = array_slice($results, 0, 30);

            return $this->response->setJSON([
                'status' => true,
                'results' => $results,
                'total' => count($results)
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Search error: ' . $e->getMessage());
            log_message('error', 'Search error trace: ' . $e->getTraceAsString());
            
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Search error: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }

    private function searchAll($query)
    {
        $results = [];
        $queryLower = strtolower($query);

        // 1. Search Static Pages
        $staticPages = $this->getStaticPages();
        foreach ($staticPages as $page) {
            $content = strtolower($page['title'] . ' ' . $page['content']);
            if (strpos($content, $queryLower) !== false) {
                $results[] = [
                    'type' => 'page',
                    'title' => $page['title'],
                    'description' => $this->getSnippet($page['content'], $query),
                    'url' => $page['url'],
                    'icon' => $page['icon'] ?? 'fa-file-text-o',
                    'module' => 'Pages'
                ];
            }
        }

        // 2. Search Database Tables
        $db = db_connect();

        // Search MLA table
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
                    $desc = 'Constituency: ' . ($record['constituency'] ?? 'N/A');
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

        // Search Constituency table
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

        // Search Complaints table
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
                    $desc = 'Category: ' . ($record['category'] ?? 'N/A');
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

        // Search Feedback table
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

        // Search Rating Questions table
        if ($db->tableExists('rating_questions')) {
            try {
                $builder = $db->table('rating_questions');
                $builder->like('question', $query);
                $builder->orLike('category', $query);
                $builder->limit(5);
                $records = $builder->get()->getResultArray();
                
                foreach ($records as $record) {
                    $title = $record['question'] ?? 'Rating Question';
                    $desc = 'Category: ' . ($record['category'] ?? 'General');
                    $results[] = [
                        'type' => 'database',
                        'title' => $title,
                        'description' => $this->getSnippet($desc, $query),
                        'url' => base_url('admin/ratingquestion'),
                        'icon' => 'fa-star',
                        'module' => 'Rating Questions'
                    ];
                }
            } catch (\Exception $e) {
                log_message('error', 'Rating question search error: ' . $e->getMessage());
            }
        }

        return $results;
    }

    private function getStaticPages()
    {
        return [
            [
                'title' => 'Leadership',
                'content' => 'Leadership and MLA performance information, rankings, and evaluation',
                'url' => base_url('leadership'),
                'icon' => 'fa-trophy'
            ],
            [
                'title' => 'MLA Information',
                'content' => 'Know Your MLA - Complete information about elected representatives, their work, and constituency details',
                'url' => base_url('mla'),
                'icon' => 'fa-user-circle'
            ],
            [
                'title' => 'MLA Rating',
                'content' => 'Rate your MLA on various parameters including development work, accessibility, and public service delivery',
                'url' => base_url('user/mla-rating'),
                'icon' => 'fa-star'
            ],
            [
                'title' => 'Report Complaint',
                'content' => 'File complaints about local issues, infrastructure problems, and public services',
                'url' => base_url('user/complaint'),
                'icon' => 'fa-exclamation-triangle'
            ],
            [
                'title' => 'Submit Feedback',
                'content' => 'Share feedback about MLA performance, public services, and community development',
                'url' => base_url('user/feedback'),
                'icon' => 'fa-comment-o'
            ]
        ];
    }

    private function getSnippet($text, $query, $length = 100)
    {
        if (empty($text)) {
            return '';
        }
        
        $text = strip_tags($text);
        $text = html_entity_decode($text);
        $pos = stripos($text, $query);
        
        if ($pos === false) {
            return substr($text, 0, $length) . '...';
        }

        $start = max(0, $pos - 40);
        $end = min(strlen($text), $pos + strlen($query) + 40);
        
        $snippet = substr($text, $start, $end - $start);
        
        if ($start > 0) {
            $snippet = '...' . $snippet;
        }
        if ($end < strlen($text)) {
            $snippet = $snippet . '...';
        }

        return $snippet;
    }
}