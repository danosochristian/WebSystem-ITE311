<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Migrations extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Enable/Disable Migrations
     * --------------------------------------------------------------------------
     */
    public bool $enabled = true;

    /**
     * --------------------------------------------------------------------------
     * Migration Type
     * --------------------------------------------------------------------------
     *
     * Options:
     * - 'sequential' = Uses 001, 002, 003... as migration versions
     * - 'timestamp'  = Uses timestamps like 2025-08-20-123456_
     */
    public string $type = 'timestamp';   // ✅ add this line

    /**
     * --------------------------------------------------------------------------
     * Migrations Table
     * --------------------------------------------------------------------------
     */
    public string $table = 'migrations';

    /**
     * --------------------------------------------------------------------------
     * Timestamp Format
     * --------------------------------------------------------------------------
     */
    public string $timestampFormat = 'Y-m-d-His_';
}
