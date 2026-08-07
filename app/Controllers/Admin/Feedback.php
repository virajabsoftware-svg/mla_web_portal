<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User\FeedbackModel;
use App\Models\User\SiteDataModel;

class Feedback extends BaseController
{
    protected $feedbackModel;
    protected $siteDataModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        $this->siteDataModel = new SiteDataModel();
    }

    /**
     * Display the feedback dashboard
     */
    public function index()
    {
        // Get all feedback from database
        $allFeedback = $this->feedbackModel->orderBy('created_at', 'DESC')->findAll();
        
        // Calculate stats from actual data
        $stats = $this->feedbackModel->getStats();
        
        // Update site_data table with current stats
        $this->updateStats();
        
        // Get form settings
        $formSettings = $this->siteDataModel->getFormSettings();
        
        // Get categories
        $categories = $this->siteDataModel->getCategories();

        // Get district data
        $districts = $this->getDistrictData();

        $data = [
            'title' => 'GovTrack Aura | Premium Governance Dashboard',
            'stats' => $stats,
            'formSettings' => $formSettings,
            'categories' => $categories,
            'history' => $allFeedback,
            'districts' => $districts,
            'feedbackId' => $this->feedbackModel->generateFeedbackId(),
            'voterId' => 'VTR' . rand(10000, 99999),
            'mlaId' => 'MLA' . rand(100, 999),
            'submissionDate' => date('Y-m-d\TH:i')
        ];

        return view('user/Feedback', $data);
    }

    /**
     * Submit feedback
     */
    public function submit()
    {
        if (!$this->request->isAJAX() && $this->request->getMethod() !== 'post') {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid request method'
            ]);
        }

        $rules = [
            'category' => 'required',
            'description' => 'required|min_length[10]',
            'district' => 'permit_empty',
            'constituency' => 'permit_empty',
            'village' => 'permit_empty',
            'work_id' => 'permit_empty',
            'voter_id' => 'permit_empty',
            'mla_id' => 'permit_empty'
        ];

        if (!$this->validate($rules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'errors' => $this->validator->getErrors()
                ]);
            }
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $feedbackId = $this->feedbackModel->generateFeedbackId();
        
        // Handle file upload
        $attachment = '';
        $file = $this->request->getFile('attachment');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads/feedback', $newName);
            $attachment = $newName;
        }

        $data = [
            'feedback_id' => $feedbackId,
            'voter_id' => $this->request->getPost('voter_id') ?? 'VTR' . rand(10000, 99999),
            'mla_id' => $this->request->getPost('mla_id') ?? 'MLA' . rand(100, 999),
            'work_id' => $this->request->getPost('work_id'),
            'district' => $this->request->getPost('district'),
            'constituency' => $this->request->getPost('constituency'),
            'village' => $this->request->getPost('village'),
            'category' => $this->request->getPost('category'),
            'source' => $this->request->getPost('source') ?? 'Web Portal',
            'description' => $this->request->getPost('description'),
            'attachment' => $attachment,
            'status' => 'pending',
            'submission_date' => date('Y-m-d H:i:s')
        ];

        if ($this->feedbackModel->insert($data)) {
            // Update stats after insertion
            $this->updateStats();
            
            // Get updated stats for response
            $updatedStats = $this->feedbackModel->getStats();
            
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Feedback submitted successfully!',
                    'feedback_id' => $feedbackId,
                    'stats' => $updatedStats,
                    'data' => $data
                ]);
            }
            
            return redirect()->to('/user/feedback')->with('success', 'Feedback submitted successfully!');
        }

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to submit feedback. Please try again.'
            ]);
        }

        return redirect()->back()->withInput()->with('error', 'Failed to submit feedback. Please try again.');
    }

    /**
     * Get feedback details for modal
     */
    public function getDetails($id)
    {
        $feedback = $this->feedbackModel->getFeedbackById($id);
        
        if (!$feedback) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Feedback not found'
            ]);
        }

        // Format the data for display
        $statusMap = [
            'pending' => ['class' => 'bg-warning', 'text' => 'Under Review'],
            'reviewed' => ['class' => 'bg-success', 'text' => 'Reviewed'],
            'in_progress' => ['class' => 'bg-info', 'text' => 'In Progress'],
            'resolved' => ['class' => 'bg-success', 'text' => 'Resolved']
        ];

        $feedback['status_display'] = $statusMap[$feedback['status']] ?? ['class' => 'bg-secondary', 'text' => $feedback['status']];
        $feedback['formatted_date'] = date('d-M-Y h:i A', strtotime($feedback['submission_date'] ?? $feedback['created_at']));
        
        return $this->response->setJSON([
            'success' => true,
            'data' => $feedback
        ]);
    }

    /**
     * Update feedback status
     */
    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        
        if (!$status || !in_array($status, ['pending', 'reviewed', 'in_progress', 'resolved'])) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Invalid status'
            ]);
        }

        if ($this->feedbackModel->updateStatus($id, $status)) {
            $this->updateStats();
            
            // Get updated feedback data
            $feedback = $this->feedbackModel->getFeedbackById($id);
            $statusMap = [
                'pending' => ['class' => 'bg-warning', 'text' => 'Under Review'],
                'reviewed' => ['class' => 'bg-success', 'text' => 'Reviewed'],
                'in_progress' => ['class' => 'bg-info', 'text' => 'In Progress'],
                'resolved' => ['class' => 'bg-success', 'text' => 'Resolved']
            ];
            
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Status updated successfully',
                'status_display' => $statusMap[$status] ?? ['class' => 'bg-secondary', 'text' => $status],
                'stats' => $this->feedbackModel->getStats()
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Failed to update status'
        ]);
    }

    /**
     * Get all feedback data for AJAX
     */
    public function getFeedbackData()
    {
        $feedback = $this->feedbackModel->orderBy('created_at', 'DESC')->findAll();
        $stats = $this->feedbackModel->getStats();
        
        return $this->response->setJSON([
            'success' => true,
            'stats' => $stats,
            'data' => $feedback
        ]);
    }

    /**
     * Update stats in site_data table
     */
    private function updateStats()
    {
        $stats = $this->feedbackModel->getStats();
        $this->siteDataModel->updateStats([
            'total_feedback' => $stats['total'],
            'reviewed' => $stats['reviewed'],
            'under_review' => $stats['under_review'],
            'resolved' => $stats['resolved']
        ]);
    }

    /**
     * Get district data
     */
    private function getDistrictData()
    {
        return [
            "Ahmednagar (Ahilyanagar)" => ["Akole", "Sangamner", "Shirdi", "Kopargaon", "Rahata", "Shrirampur", "Nevasa", "Shevgaon", "Rahuri", "Parner", "Ahmednagar City", "Shrigonda"],
            "Akola" => ["Akot", "Balapur", "Akola West", "Akola East", "Murtizapur"],
            "Amravati" => ["Daryapur", "Melghat", "Achalpur", "Morshi", "Arvi", "Teosa", "Amravati", "Badnera"],
            "Chhatrapati Sambhajinagar (Aurangabad)" => ["Kannad", "Sillod", "Gangapur", "Vaijapur", "Aurangabad Central", "Aurangabad West", "Aurangabad East", "Paithan", "Phulambri"],
            "Beed" => ["Georai", "Majalgaon", "Beed", "Ashti", "Kaij", "Parli"],
            "Bhandara" => ["Tumsar", "Bhandara", "Sakoli"],
            "Buldhana" => ["Jalgaon Jamod", "Malkapur", "Buldhana", "Chikhli", "Sindkhed Raja", "Mehkar", "Khamgaon"],
            "Chandrapur" => ["Warora", "Chandrapur", "Ballarpur", "Brahmapuri", "Chimur", "Rajura"],
            "Dhule" => ["Shirpur", "Sindkheda", "Dhule Rural", "Dhule City", "Sakri"],
            "Gadchiroli" => ["Armori", "Gadchiroli", "Aheri"],
            "Gondia" => ["Gondiya", "Tirora", "Arjuni Morgaon", "Amgaon"],
            "Hingoli" => ["Basmat", "Kalamnuri", "Hingoli"],
            "Jalgaon" => ["Chopda", "Raver", "Bhusawal", "Jalgaon City", "Jalgaon Rural", "Amalner", "Erandol", "Pachora", "Chalisgaon", "Jamner", "Muktainagar"],
            "Jalna" => ["Bhokardan", "Jafrabad", "Badnapur", "Jalna", "Partur"],
            "Kolhapur" => ["Chandgad", "Radhanagari", "Kagal", "Kolhapur South", "Karvir", "Kolhapur North", "Shahuwadi", "Hatkanangle", "Ichalkaranji", "Shirol"],
            "Latur" => ["Latur Rural", "Latur City", "Ahmedpur", "Udgir", "Nilanga", "Ausa"],
            "Mumbai City" => ["Colaba", "Malabar Hill", "Mumbadevi", "Byculla", "Shivadi", "Worli", "Mahim", "Dharavi", "Sion Koliwada", "Wadala"],
            "Mumbai Suburban" => ["Versova", "Andheri West", "Andheri East", "Vile Parle", "Chandivali", "Ghatkopar West", "Ghatkopar East", "Mankhurd Shivaji Nagar", "Anushakti Nagar", "Borivali", "Dahisar", "Magathane", "Mulund", "Vikhroli", "Bhandup West", "Jogeshwari East", "Dindoshi", "Goregaon", "Kandivali East", "Charkop", "Malad West", "Kurla", "Kalina", "Bandra East", "Bandra West", "Powai"],
            "Nagpur" => ["Katol", "Savner", "Hingna", "Umred", "Nagpur South West", "Nagpur South", "Nagpur East", "Nagpur Central", "Nagpur West", "Nagpur North", "Kamptee", "Ramtek"],
            "Nanded" => ["Nanded North", "Nanded South", "Naigaon", "Bhokar", "Deglur", "Mukhed", "Kinwat", "Hadgaon", "Loha"],
            "Nandurbar" => ["Akkalkuwa", "Shahada", "Nandurbar", "Nawapur"],
            "Nashik" => ["Nandgaon", "Malegaon Central", "Malegaon Outer", "Baglan", "Kalwan", "Chandwad", "Yevla", "Sinnar", "Nashik East", "Nashik Central", "Nashik West", "Deolali", "Igatpuri", "Dindori", "Niphad"],
            "Dharashiv (Osmanabad)" => ["Karmala", "Paranda", "Osmanabad", "Tuljapur", "Umarga"],
            "Palghar" => ["Dahanu", "Vikramgad", "Palghar", "Boisar", "Nalasopara", "Vasai"],
            "Parbhani" => ["Jintur", "Parbhani", "Gangakhed", "Pathri"],
            "Pune" => ["Shirur", "Daund", "Indapur", "Baramati", "Purandar", "Bhor", "Maval", "Chinchwad", "Pimpri", "Bhosari", "Vadgaon Sheri", "Shivajinagar", "Kothrud", "Khadakwasla", "Parvati", "Hadapsar", "Pune Cantonment", "Kasba Peth", "Pune City"],
            "Raigad" => ["Pen", "Alibag", "Shrivardhan", "Mahad", "Karjat", "Uran", "Panvel"],
            "Ratnagiri" => ["Dapoli", "Guhagar", "Chiplun", "Ratnagiri", "Rajapur"],
            "Sangli" => ["Jat", "Kavathe Mahankal", "Tasgaon-Kavathe Mahankal", "Sangli", "Islampur", "Shirala", "Miraj", "Palus-Kadegaon", "Khanapur-Atpadi", "Vita"],
            "Satara" => ["Man", "Karad North", "Karad South", "Patan", "Jaoli", "Wai", "Koregaon", "Phaltan"],
            "Sindhudurg" => ["Kankavli", "Kudal", "Sawantwadi"],
            "Solapur" => ["Akkalkot", "Solapur City North", "Solapur City Central", "Solapur South", "Pandharpur", "Sangole", "Malshiras", "Mohol", "Madha", "Barshi", "Karmala"],
            "Thane" => ["Thane", "Kopri-Pachpakhadi", "Ovala-Majiwada", "Mira Bhayandar", "Bhiwandi East", "Bhiwandi West", "Bhiwandi Rural", "Kalyan West", "Kalyan East", "Dombivli", "Ambernath", "Ulhasnagar", "Mumbra-Kalwa", "Airoli", "Belapur"],
            "Wardha" => ["Wardha", "Hinganghat", "Arvi", "Deoli"],
            "Washim" => ["Washim", "Risod", "Karanja"],
            "Yavatmal" => ["Yavatmal", "Wani", "Ralegaon", "Arni", "Pusad", "Umarkhed", "Digras", "Ghatanji"]
        ];
    }
}