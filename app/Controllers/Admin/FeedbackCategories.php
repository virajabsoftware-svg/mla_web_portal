<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FeedbackCategoryModel;

class FeedbackCategories extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new FeedbackCategoryModel();
    }

    // Redirect to Feedback Dashboard
    private function dashboardRedirect()
    {
        return redirect()->to(
            base_url('admin/feedback-dashboard#categoryManagement')
        );
    }

    // ==========================================
    // ADD CATEGORY
    // ==========================================
    public function store()
    {
        $categoryName = trim(
            (string) $this->request->getPost('category_name')
        );

        if ($categoryName === '') {
            return $this->dashboardRedirect()
                ->with('error', 'Please enter category name.');
        }

        // Check duplicate category
        $existing = $this->categoryModel
            ->where('category_name', $categoryName)
            ->first();

        if ($existing) {
            return $this->dashboardRedirect()
                ->with('error', 'Category already exists.');
        }

        try {

            $this->categoryModel->insert([
                'category_name' => $categoryName,
                'status'        => 1
            ]);

            return $this->dashboardRedirect()
                ->with('success', 'Category added successfully.');

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Category Add Error: ' . $e->getMessage()
            );

            return $this->dashboardRedirect()
                ->with('error', 'Unable to add category.');
        }
    }

    // ==========================================
    // UPDATE CATEGORY
    // ==========================================
    public function update($id)
    {
        $id = (int) $id;

        // Find category
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return $this->dashboardRedirect()
                ->with('error', 'Category not found.');
        }

        // Get updated category name
        $categoryName = trim(
            (string) $this->request->getPost('category_name')
        );

        if ($categoryName === '') {
            return $this->dashboardRedirect()
                ->with('error', 'Please enter category name.');
        }

        // Check duplicate category excluding current ID
        $existing = $this->categoryModel
            ->where('category_name', $categoryName)
            ->where('id !=', $id)
            ->first();

        if ($existing) {
            return $this->dashboardRedirect()
                ->with('error', 'Category already exists.');
        }

        try {

            // Update category in database
            $result = $this->categoryModel->update($id, [
                'category_name' => $categoryName
            ]);

            if (!$result) {
                return $this->dashboardRedirect()
                    ->with('error', 'Category update failed.');
            }

            // Verify updated data
            $updatedCategory = $this->categoryModel->find($id);

            if (
                !$updatedCategory ||
                $updatedCategory['category_name'] !== $categoryName
            ) {
                return $this->dashboardRedirect()
                    ->with('error', 'Category was not updated in database.');
            }

            // Success message only after verification
            return $this->dashboardRedirect()
                ->with('success', 'Category updated successfully.');

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Category Update Error: ' . $e->getMessage()
            );

            return $this->dashboardRedirect()
                ->with('error', 'Unable to update category.');
        }
    }

    // ==========================================
    // ACTIVATE / DEACTIVATE CATEGORY
    // ==========================================
    public function changeStatus($id)
    {
        $id = (int) $id;

        $category = $this->categoryModel->find($id);

        if (!$category) {
            return $this->dashboardRedirect()
                ->with('error', 'Category not found.');
        }

        try {

            $newStatus = (
                (int) $category['status'] === 1
            ) ? 0 : 1;

            $this->categoryModel->update($id, [
                'status' => $newStatus
            ]);

            // Verify status update
            $updatedCategory = $this->categoryModel->find($id);

            if (
                !$updatedCategory ||
                (int) $updatedCategory['status'] !== $newStatus
            ) {
                return $this->dashboardRedirect()
                    ->with('error', 'Category status update failed.');
            }

            return $this->dashboardRedirect()
                ->with('success', 'Category status updated successfully.');

        } catch (\Throwable $e) {

            log_message(
                'error',
                'Category Status Error: ' . $e->getMessage()
            );

            return $this->dashboardRedirect()
                ->with('error', 'Unable to update category status.');
        }
    }
    // DELETE CATEGORY
public function delete($id)
{
    $id = (int) $id;

    $category = $this->categoryModel->find($id);

    if (!$category) {
        return $this->dashboardRedirect()
            ->with('error', 'Category not found.');
    }

    try {

        $result = $this->categoryModel->delete($id);

        if (!$result) {
            return $this->dashboardRedirect()
                ->with('error', 'Category delete failed.');
        }

        return $this->dashboardRedirect()
            ->with('success', 'Category deleted successfully.');

    } catch (\Throwable $e) {

        log_message(
            'error',
            'Category Delete Error: ' . $e->getMessage()
        );

        return $this->dashboardRedirect()
            ->with('error', 'Unable to delete category.');
    }
}
}
