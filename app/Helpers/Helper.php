<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Image Upload (Public Uploads Folder)
|--------------------------------------------------------------------------
*/
if (!function_exists('uploadImage')) {
    function uploadImage($file, $folder)
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $imageName = Str::slug(time() . '-' . uniqid()) . '.' . $file->extension();
        $path = public_path('uploads/' . $folder);

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $file->move($path, $imageName);

        return 'uploads/' . $folder . '/' . $imageName;
    }
}

/*
|--------------------------------------------------------------------------
| Store File (storage/app/public)
|--------------------------------------------------------------------------
*/
if (!function_exists('storeFile')) {
    function storeFile($file, $folder)
    {
        if (!$file || !$file->isValid()) {
            return null;
        }

        $fileName = Str::slug(time() . '-' . uniqid()) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs($folder, $fileName, 'public');

        return 'storage/' . $filePath;
    }
}

/*
|--------------------------------------------------------------------------
| Delete Image from storage
|--------------------------------------------------------------------------
*/
if (!function_exists('deleteImage')) {
    function deleteImage($imageUrl)
    {
        if (!$imageUrl) {
            return false;
        }

        try {
            // remove domain if exists
            $path = parse_url($imageUrl, PHP_URL_PATH);

            // remove /storage/ prefix
            $relativePath = preg_replace('/^\/?storage\//', '', $path);

            if (Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
                return true;
            }

            return false;
        } catch (\Exception $e) {
            return false;
        }
    }
}

/*
|--------------------------------------------------------------------------
| Generate Unique Slug
|--------------------------------------------------------------------------
*/
if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($title, $table, $slugColumn = 'slug')
    {
        $slug = Str::slug($title);

        $count = DB::table($table)
            ->where($slugColumn, 'LIKE', "{$slug}%")
            ->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }
}

/*
|--------------------------------------------------------------------------
| Generate Unique SKU
|--------------------------------------------------------------------------
*/
if (!function_exists('generateUniqueSKU')) {
    function generateUniqueSKU($table, $column, $length = 10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);

        do {
            $sku = '';
            for ($i = 0; $i < $length; $i++) {
                $sku .= $characters[rand(0, $charactersLength - 1)];
            }
        } while (DB::table($table)->where($column, $sku)->exists());

        return $sku;
    }
}

if (!function_exists('admin_can')) {
    function admin_can($module, $action = 'view')
    {
        $user = auth()->user();

        if (!$user || !$user->is_admin) {
            return false;
        }

        return \App\Models\AdminPrivilege::where('admin_id', $user->id)
            ->where('module', $module)
            ->whereJsonContains('actions', $action)
            ->exists();
    }
}
