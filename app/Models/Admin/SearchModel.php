<?php

namespace App\Models;

use CodeIgniter\Model;

class SearchModel extends Model
{
    public function searchAll($query)
    {
        $results = [];

        // 1. Search Static Pages
        $staticPages = $this->searchStaticPages($query);
        $results = array_merge($results, $staticPages);

        // 2. Search MLA Records
        $mlaResults = $this->searchMLA($query);
        $results = array_merge($results, $mlaResults);

        // 3. Search Constituency Records
        $constituencyResults = $this->searchConstituency($query);
        $results = array_merge($results, $constituencyResults);

        // 4. Search Complaint Records
        $complaintResults = $this->searchComplaints($query);
        $results = array_merge($results, $complaintResults);

        // 5. Search Feedback Records
        $feedbackResults = $this->searchFeedback($query);
        $results = array_merge($results, $feedbackResults);

        // 6. Search Rating Questions
        $ratingResults = $this->searchRatingQuestions($query);
        $results = array_merge($results, $ratingResults);

        // 7. Search Survey Records
        $surveyResults = $this->searchSurveys($query);
        $results = array_merge($results, $surveyResults);

        // 8. Search Voter Records (for admin only)
        $voterResults = $this->searchVoters($query);
        $results = array_merge($results, $voterResults);

        // 9. Search Notification Records
        $notificationResults = $this->searchNotifications($query);
        $results = array_merge($results, $notificationResults);

        // Remove duplicates
        $results = $this->removeDuplicates($results);

        return $results;
    }

    private function searchStaticPages($query)
    {
        $pages = $this->getStaticPageContent();
        $results = [];
        $queryLower = strtolower($query);

        foreach ($pages as $page) {
            $content = strtolower($page['title'] . ' ' . $page['content']);
            if (strpos($content, $queryLower) !== false) {
                // Find the snippet
                $snippet = $this->getSnippet($page['content'], $query);
                $results[] = [
                    'type' => 'page',
                    'title' => $page['title'],
                    'description' => $snippet ?: $page['description'],
                    'url' => $page['url'],
                    'icon' => $page['icon'] ?? 'fa-file-text-o',
                    'module' => 'Pages'
                ];
            }
        }

        return $results;
    }

    private function getStaticPageContent()
    {
        // Static pages content - update this based on your actual pages
        return [
            [
                'title' => 'Leadership',
                'description' => 'Leadership and MLA performance information',
                'content' => 'Leadership rankings, MLA performance, evaluation, and leaderboard information',
                'url' => base_url('leadership'),
                'icon' => 'fa-trophy'
            ],
            [
                'title' => 'MLA Information',
                'description' => 'Know Your MLA - Complete information about elected representatives',
                'content' => 'MLA details, contact information, constituency, development work, and public services',
                'url' => base_url('mla'),
                'icon' => 'fa-user-circle'
            ],
            [
                'title' => 'MLA Rating',
                'description' => 'Rate your MLA and provide feedback on their performance',
                'content' => 'Rate your MLA on various parameters including development, accessibility, and public service',
                'url' => base_url('user/mla-rating'),
                'icon' => 'fa-star'
            ],
            [
                'title' => 'Report a Complaint',
                'description' => 'File complaints about local issues, infrastructure, and public services',
                'content' => 'Complaint filing, grievance redressal, public issues, infrastructure problems, and civic services',
                'url' => base_url('user/complaint'),
                'icon' => 'fa-exclamation-triangle'
            ],
            [
                'title' => 'Feedback',
                'description' => 'Share feedback about MLA performance and public services',
                'content' => 'Feedback submission, public opinion, suggestions, and community input',
                'url' => base_url('user/feedback'),
                'icon' => 'fa-comment-o'
            ],
            [
                'title' => 'Surveys',
                'description' => 'Participate in surveys and public opinion polls',
                'content' => 'Surveys, polls, public opinion, community feedback, and data collection',
                'url' => base_url('user/survey'),
                'icon' => 'fa-bar-chart'
            ],
            [
                'title' => 'MLA Works',
                'description' => 'View development works and projects by your MLA',
                'content' => 'Development projects, infrastructure, public works, constituency development, and MLA achievements',
                'url' => base_url('user/mla-works'),
                'icon' => 'fa-building'
            ]
        ];
    }

    private function getSnippet($text, $query, $length = 120)
    {
        $text = strip_tags($text);
        $text = html_entity_decode($text);
        $pos = stripos($text, $query);
        
        if ($pos === false) {
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

    private function searchMLA($query)
    {
        $db = db_connect();
        $results = [];
        $queryLower = strtolower($query);

        // Check if MLA table exists
        if ($db->tableExists('mla')) {
            $builder = $db->table('mla');
            $builder->like('mla_name', $query);
            $builder->orLike('constituency', $query);
            $builder->orLike('district', $query);
            $builder->orLike('party', $query);
            $builder->orLike('designation', $query);
            $builder->limit(10);
            
            $mlaRecords = $builder->get()->getResultArray();

            foreach ($mlaRecords as $record) {
                $title = $record['mla_name'] ?? 'MLA Record';
                $description = 'Constituency: ' . ($record['constituency'] ?? 'N/A') . 
                              ' | District: ' . ($record['district'] ?? 'N/A') .
                              ' | Party: ' . ($record['party'] ?? 'N/A');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($description, $query),
                    'url' => base_url('admin/mla-management'),
                    'icon' => 'fa-user',
                    'module' => 'MLA',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function searchConstituency($query)
    {
        $db = db_connect();
        $results = [];
        $queryLower = strtolower($query);

        if ($db->tableExists('constituencies')) {
            $builder = $db->table('constituencies');
            $builder->like('constituency_name', $query);
            $builder->orLike('district', $query);
            $builder->orLike('region', $query);
            $builder->orLike('description', $query);
            $builder->limit(10);
            
            $records = $builder->get()->getResultArray();

            foreach ($records as $record) {
                $title = $record['constituency_name'] ?? 'Constituency';
                $description = 'District: ' . ($record['district'] ?? 'N/A') . 
                              ' | Region: ' . ($record['region'] ?? 'N/A');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($description, $query),
                    'url' => base_url('admin/constituency-management'),
                    'icon' => 'fa-map-marker',
                    'module' => 'Constituency',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function searchComplaints($query)
    {
        $db = db_connect();
        $results = [];

        if ($db->tableExists('complaints')) {
            $builder = $db->table('complaints');
            $builder->like('title', $query);
            $builder->orLike('description', $query);
            $builder->orLike('category', $query);
            $builder->orLike('location', $query);
            $builder->orLike('village', $query);
            $builder->orLike('constituency', $query);
            $builder->orLike('status', $query);
            $builder->limit(10);
            
            $records = $builder->get()->getResultArray();

            foreach ($records as $record) {
                $title = $record['title'] ?? 'Complaint #' . ($record['id'] ?? '');
                $description = 'Category: ' . ($record['category'] ?? 'N/A') . 
                              ' | Status: ' . ($record['status'] ?? 'N/A') .
                              ' | Location: ' . ($record['location'] ?? 'N/A');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($record['description'] ?? '', $query),
                    'url' => base_url('admin/complaint-management'),
                    'icon' => 'fa-exclamation-circle',
                    'module' => 'Complaints',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function searchFeedback($query)
    {
        $db = db_connect();
        $results = [];

        if ($db->tableExists('feedback')) {
            $builder = $db->table('feedback');
            $builder->like('category', $query);
            $builder->orLike('description', $query);
            $builder->orLike('village', $query);
            $builder->orLike('constituency', $query);
            $builder->orLike('district', $query);
            $builder->orLike('status', $query);
            $builder->limit(10);
            
            $records = $builder->get()->getResultArray();

            foreach ($records as $record) {
                $title = 'Feedback - ' . ($record['category'] ?? 'General');
                $description = 'Constituency: ' . ($record['constituency'] ?? 'N/A') . 
                              ' | Status: ' . ($record['status'] ?? 'N/A');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($record['description'] ?? '', $query),
                    'url' => base_url('admin/feedback-dashboard'),
                    'icon' => 'fa-comments',
                    'module' => 'Feedback',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function searchRatingQuestions($query)
    {
        $db = db_connect();
        $results = [];

        if ($db->tableExists('rating_questions')) {
            $builder = $db->table('rating_questions');
            $builder->like('question', $query);
            $builder->orLike('category', $query);
            $builder->orLike('description', $query);
            $builder->limit(10);
            
            $records = $builder->get()->getResultArray();

            foreach ($records as $record) {
                $title = $record['question'] ?? 'Rating Question';
                $description = 'Category: ' . ($record['category'] ?? 'General') . 
                              ' | Type: ' . ($record['type'] ?? 'Rating');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($record['description'] ?? '', $query),
                    'url' => base_url('admin/ratingquestion'),
                    'icon' => 'fa-star',
                    'module' => 'Rating Questions',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function searchSurveys($query)
    {
        $db = db_connect();
        $results = [];

        if ($db->tableExists('surveys')) {
            $builder = $db->table('surveys');
            $builder->like('title', $query);
            $builder->orLike('description', $query);
            $builder->orLike('category', $query);
            $builder->limit(10);
            
            $records = $builder->get()->getResultArray();

            foreach ($records as $record) {
                $title = $record['title'] ?? 'Survey';
                $description = 'Category: ' . ($record['category'] ?? 'General') . 
                              ' | Status: ' . ($record['status'] ?? 'Active');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($record['description'] ?? '', $query),
                    'url' => base_url('admin/survey-management'),
                    'icon' => 'fa-bar-chart',
                    'module' => 'Surveys',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function searchVoters($query)
    {
        $db = db_connect();
        $results = [];

        if ($db->tableExists('voters')) {
            $builder = $db->table('voters');
            $builder->like('name', $query);
            $builder->orLike('village', $query);
            $builder->orLike('constituency', $query);
            $builder->orLike('district', $query);
            $builder->orLike('voter_id', $query);
            $builder->limit(10);
            
            $records = $builder->get()->getResultArray();

            foreach ($records as $record) {
                $title = $record['name'] ?? 'Voter';
                $description = 'Voter ID: ' . ($record['voter_id'] ?? 'N/A') . 
                              ' | Village: ' . ($record['village'] ?? 'N/A') .
                              ' | Constituency: ' . ($record['constituency'] ?? 'N/A');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($description, $query),
                    'url' => base_url('admin/voter-management'),
                    'icon' => 'fa-user-circle',
                    'module' => 'Voters',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function searchNotifications($query)
    {
        $db = db_connect();
        $results = [];

        if ($db->tableExists('notifications')) {
            $builder = $db->table('notifications');
            $builder->like('title', $query);
            $builder->orLike('message', $query);
            $builder->orLike('type', $query);
            $builder->limit(10);
            
            $records = $builder->get()->getResultArray();

            foreach ($records as $record) {
                $title = $record['title'] ?? 'Notification';
                $description = 'Type: ' . ($record['type'] ?? 'General') . 
                              ' | Status: ' . ($record['status'] ?? 'Unread');
                
                $results[] = [
                    'type' => 'database',
                    'title' => $title,
                    'description' => $this->getSnippet($record['message'] ?? '', $query),
                    'url' => base_url('admin/notification-center'),
                    'icon' => 'fa-bell',
                    'module' => 'Notifications',
                    'record_id' => $record['id'] ?? null
                ];
            }
        }

        return $results;
    }

    private function removeDuplicates($results)
    {
        $unique = [];
        $seen = [];

        foreach ($results as $result) {
            $key = $result['title'] . '|' . $result['type'];
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $unique[] = $result;
            }
        }

        return $unique;
    }
}