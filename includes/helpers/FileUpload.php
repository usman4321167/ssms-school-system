<?php
/**
 * File Upload Helper
 * Smart School Management System
 */

class FileUpload {
    protected $uploadDir;
    protected $allowedExtensions;
    protected $maxFileSize;

    public function __construct($uploadDir = UPLOAD_DIR, $allowedExtensions = ALLOWED_EXTENSIONS, $maxFileSize = MAX_FILE_SIZE) {
        $this->uploadDir = $uploadDir;
        $this->allowedExtensions = $allowedExtensions;
        $this->maxFileSize = $maxFileSize;

        // Create upload directory if it doesn't exist
        if (!is_dir($this->uploadDir)) {
            mkdir($this->uploadDir, 0755, true);
        }
    }

    /**
     * Upload file
     */
    public function upload($file, $prefix = '') {
        // Validate file
        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
            return ['success' => false, 'error' => 'No file provided'];
        }

        if ($file['size'] > $this->maxFileSize) {
            return ['success' => false, 'error' => 'File size exceeds maximum limit'];
        }

        // Get file extension
        $fileInfo = pathinfo($file['name']);
        $extension = strtolower($fileInfo['extension']);

        // Validate extension
        if (!in_array($extension, $this->allowedExtensions)) {
            return ['success' => false, 'error' => 'File type not allowed'];
        }

        // Generate unique filename
        $filename = ($prefix ? $prefix . '_' : '') . uniqid() . '.' . $extension;
        $filepath = $this->uploadDir . $filename;

        // Move uploaded file
        if (move_uploaded_file($file['tmp_name'], $filepath)) {
            return ['success' => true, 'filename' => $filename, 'path' => $filepath];
        }

        return ['success' => false, 'error' => 'Failed to upload file'];
    }

    /**
     * Delete file
     */
    public function delete($filename) {
        $filepath = $this->uploadDir . $filename;
        
        if (file_exists($filepath)) {
            if (unlink($filepath)) {
                return ['success' => true];
            }
            return ['success' => false, 'error' => 'Failed to delete file'];
        }

        return ['success' => false, 'error' => 'File not found'];
    }

    /**
     * Get file URL
     */
    public function getFileURL($filename) {
        return SITE_URL . 'uploads/' . $filename;
    }
}
?>
