<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\Admin\Banner\Index as BannerIndex;
use App\Http\Livewire\Admin\Banner\Order;
use App\Http\Livewire\Admin\Company\Index;
use App\Http\Livewire\Admin\Gallery\Index as GalleryIndex;
use App\Http\Livewire\Admin\Plans\Index as PlansIndex;
use App\Http\Livewire\Admin\Pqrs\Index as PqrsIndex;
use App\Http\Livewire\Admin\Questions\Index as QuestionsIndex;
use App\Http\Livewire\Admin\Reviews\Index as ReviewsIndex;
use App\Http\Livewire\Admin\Services\Create;
use App\Http\Livewire\Admin\Services\Edit;
use App\Http\Livewire\Admin\Services\Index as ServicesIndex;
use App\Http\Livewire\Galleries\Index as GalleriesIndex;
use App\Http\Livewire\Galleries\Show;
use App\Http\Livewire\Gallery;
use App\Http\Livewire\Plans;
use App\Http\Livewire\Pqrs;
use App\Http\Livewire\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('planes', Plans::class)->name('plans');

Route::get('galeria', GalleriesIndex::class)->name('gallery.all');

Route::get('banner', BannerIndex::class)->name('banner.index');

Route::get('banner/order', Order::class)->name('banner.order');

Route::get('reviews/index', ReviewsIndex::class)->name('review.index');

Route::get('galeria/{service}', Show::class)->name('gallery.show');

Route::get('peticiones-quejas-reclamos-sugerencias', Pqrs::class)->name('pqrs');

Route::get('/dashboard', Index::class)->middleware(['auth'])->name('dashboard');

Route::get('servicio/{service}', Service::class)->name('service');

Route::get('services/index', ServicesIndex::class)->middleware(['auth'])->name('services.index');

Route::get('services/create', Create::class)->middleware(['auth'])->name('services.create');

Route::get('services/edit/{service}', Edit::class)->middleware(['auth'])->name('services.edit');

Route::get('gallery/index', GalleryIndex::class)->middleware(['auth'])->name('gallery.index');

Route::get('plans/index', PlansIndex::class)->middleware(['auth'])->name('plans.index');

Route::get('pqrs/index', PqrsIndex::class)->middleware(['auth'])->name('pqrs.index');

Route::get('questions/index', QuestionsIndex::class)->middleware(['auth'])->name('questions.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
