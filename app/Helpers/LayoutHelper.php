<?php

namespace App\Helpers;

class LayoutHelper
{
    /**
     * Check if an asset condition is met
     *
     * @param string $condition
     * @return bool
     */
    public static function checkCondition(string $condition): bool
    {
        $conditions = config('layouts.conditions', []);
        
        if (!isset($conditions[$condition])) {
            return true; // If condition not defined, load the asset
        }
        
        $conditionValue = $conditions[$condition];
        
        // If it's a callable, execute it
        if (is_callable($conditionValue)) {
            return $conditionValue();
        }
        
        // If it's a boolean, return it directly
        return (bool) $conditionValue;
    }
    
    /**
     * Get filtered and sorted assets
     *
     * @param string $type 'css' or 'js'
     * @param array $filters Additional filters
     * @return \Illuminate\Support\Collection
     */
    public static function getAssets(string $type, array $filters = []): \Illuminate\Support\Collection
    {
        $assets = collect(config("layouts.assets.{$type}", []));
        
        return $assets
            ->filter(function($asset, $name) use ($filters) {
                // Apply custom filters
                foreach ($filters as $filter => $value) {
                    if (is_array($asset) && isset($asset[$filter])) {
                        if ($asset[$filter] !== $value) {
                            return false;
                        }
                    }
                }
                
                // Check condition if specified
                if (is_array($asset) && isset($asset['condition'])) {
                    return self::checkCondition($asset['condition']);
                }
                
                return true;
            })
            ->sortBy(fn($asset) => is_array($asset) ? ($asset['priority'] ?? 999) : 999);
    }
    
    /**
     * Get asset path from asset configuration
     *
     * @param mixed $asset
     * @return string
     */
    public static function getAssetPath($asset): string
    {
        return is_array($asset) ? $asset['path'] : $asset;
    }
}
