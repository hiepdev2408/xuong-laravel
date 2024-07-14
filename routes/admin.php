<?php

use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->as('admin.')
    ->group(function (){
        Route::get('/', function (){
            return view('admin.dashboard');
        })->name('dashboard');
        Route::prefix('catalogues')
            ->as('catalogues.')
            ->group(function (){
                Route::get('/', [CatalogueController::class, 'index'])->name('index');
                Route::get('create', [CatalogueController::class, 'create'])->name('create');
                Route::post('store', [CatalogueController::class, 'store'])->name('store');
                Route::get('show/{id}', [CatalogueController::class, 'show'])->name('show');
                Route::get('{id}/edit', [CatalogueController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [CatalogueController::class, 'update'])->name('update');
                Route::get('{id}/destroy', [CatalogueController::class, 'destroy'])->name('destroy');
            });
        Route::resource('products', ProductController::class);
        Route::prefix('categories')
            ->as('categories.')
            ->group(function (){
                Route::get('/', [CategoriesController::class, 'index'])->name('index');
                Route::get('create', [CategoriesController::class, 'create'])->name('create');
                Route::post('store', [CategoriesController::class, 'store'])->name('store');
                Route::get('show/{id}', [CategoriesController::class, 'show'])->name('show');
                Route::get('{id}/edit', [CategoriesController::class, 'edit'])->name('edit');
                Route::put('{id}/update', [CategoriesController::class, 'update'])->name('update');
                Route::get('{id}/destroy', [CategoriesController::class, 'destroy'])->name('destroy');
            });
    });
