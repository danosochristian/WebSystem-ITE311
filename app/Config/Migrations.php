<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Migrations extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Enable/Disable Migrations
     * --------------------------------------------------------------------------
     *
     * Enable migrations whenever you intend to do a schema migration.
     */
    public bool $enabled = true;

    /**
     * --------------------------------------------------------------------------
     * Migrations Table
     * --------------------------------------------------------------------------
     *
     * This table stores the current migration state.
     */
    public string $table = 'migrations';

    /**
     * --------------------------------------------------------------------------
     * Migration Type
     * --------------------------------------------------------------------------
     *
     * 'sequential' -> 001_create_table.php, 002_add_column.php, etc.
     * 'timestamp'  -> 20250909120000_create_table.php, etc.
     */
    public string $type = 'sequential';  // change to 'timestamp' if you prefer timestamped migrations

    /**
     * --------------------------------------------------------------------------
     * Timestamp Format (for timestamped migrations only)
     * --------------------------------------------------------------------------
     *
     * Ignored if using sequential migrations.
     */
    public string $timestampFormat = 'Y-m-d-His_';
}
