<?php
/**
 * AlphaOne Building Consent System
 * Copyright 2021
 * Generated in PhpStorm.
 * Developer: Camilo Lozano III - www.camilord.com
 *                              - github.com/camilord
 *                              - linkedin.com/in/camilord
 *
 * FilesGuardian - LockedDataQuery.php
 * Username: Camilo
 * Date: 27/02/2021
 * Time: 9:48 AM
 */

namespace App\Core;

/**
 * Class LockVault
 * @package App\Core
 */
class LockVault extends BaseCore
{
    /**
     * @param string $md5_hash
     * @param string $file_path
     * @return int
     */
    public function add_file(string $md5_hash, string $file_path) {
        $q = "INSERT INTO locked_files (md5_hash, file_path, created) VALUES (?, ?, ?)";
        $this->getDB()->prepare($q)->execute([$md5_hash, $file_path, time()]);
        return (int)$this->getDB()->lastInsertId();
    }

    /**
     * @param string $dir_name
     * @return int
     */
    public function add_dir(string $dir_name) {
        $q = "INSERT INTO locked_folders (path, created) VALUES (?, ?)";
        $this->getDB()->prepare($q)->execute([$dir_name, time()]);
        return (int)$this->getDB()->lastInsertId();
    }

    /**
     * @param string $file_path
     * @return bool
     */
    public function file_exists(string $file_path) {
        $q = "SELECT id FROM locked_files WHERE file_path = ? AND deleted IS NULL";
        $stmt = $this->getDB()->prepare($q);
        $stmt->execute([$file_path]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return (count($data) > 0);
    }

    /**
     * @param string $dir_path
     * @return bool
     */
    public function dir_exists(string $dir_path) {
        $q = "SELECT id FROM locked_folders WHERE path = ? AND deleted IS NULL";
        $stmt = $this->getDB()->prepare($q);
        $stmt->execute([$dir_path]);
        $data = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return (count($data) > 0);
    }

    /**
     * empty all table
     */
    public function clear_all() {
        $tables = ['locked_files', 'locked_folders'];
        foreach($tables as $table) {
            $q = "DELETE FROM {$table}";
            $stmt = $this->getDB()->prepare($q);
            $stmt->execute([]);

            $q = "DELETE FROM SQLITE_SEQUENCE WHERE name='{$table}'";
            $stmt = $this->getDB()->prepare($q);
            $stmt->execute([]);
        }
    }
}