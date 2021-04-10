<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CallToActionController;
use App\Http\Controllers\Backend\HomeContentController;
use App\Http\Controllers\Backend\HomeContentFaqController;
use App\Http\Controllers\Backend\PortfolioCategoryController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\PriceController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\StrengthController;
use App\Http\Controllers\Backend\TeamController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CustomPageController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\WebsiteMessageController;

Route::group(['as' => 'backend.', 'prefix' => 'backend/'], function (){
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/banner', [BannerController::class, 'index'])->name('banner');
        Route::post('/banner/update', [BannerController::class, 'update'])->name('bannerUpdate');
        Route::post('/banner/update-banner-image', [BannerController::class, 'bannerImageUpdate'])->name('bannerImageUpdate');

        Route::get('/about', [AboutController::class, 'index'])->name('about');
        Route::post('/about/update', [AboutController::class, 'update'])->name('aboutUpdate');

        Route::get('/strength-page', [StrengthController::class, 'strength'])->name('strength');
        Route::post('/strength/update', [StrengthController::class, 'strengthUpdate'])->name('strengthUpdate');

        Route::get('/service-page', [ServiceController::class, 'service'])->name('service');
        Route::post('/service/update', [ServiceController::class, 'serviceUpdate'])->name('serviceUpdate');

        Route::get('/portfolio-page', [PortfolioController::class, 'portfolio'])->name('portfolio');
        Route::post('/portfolio/update', [PortfolioController::class, 'portfolioUpdate'])->name('portfolioUpdate');
        Route::patch('/portfolio/add-image/{portfolio}', [PortfolioController::class, 'addPortfolioImages'])->name('addPortfolioImages');
        Route::post('/portfolio/remove-image', [PortfolioController::class, 'removePortfolioImages'])->name('removePortfolioImages');
        Route::post('/portfolio/images', [PortfolioController::class, 'getPortfolioImages'])->name('getPortfolioImages');

        Route::get('/team-page', [TeamController::class, 'team'])->name('team');
        Route::post('/team/update', [TeamController::class, 'teamUpdate'])->name('teamUpdate');

        Route::get('/price-page', [PriceController::class, 'price'])->name('price');
        Route::post('/price/update', [PriceController::class, 'priceUpdate'])->name('priceUpdate');

        Route::get('/faq-page', [FaqController::class, 'faq'])->name('faq');
        Route::post('/faq/update', [FaqController::class, 'faqUpdate'])->name('faqUpdate');

        Route::post('/message/update', [WebsiteMessageController::class, 'messageUpdate'])->name('messageUpdate');
        Route::post('/subscriber/update', [SubscriberController::class, 'subscriberUpdate'])->name('subscriberUpdate');

        Route::resource('homeContent', HomeContentController::class);
        Route::resource('homeContentFaq', HomeContentFaqController::class);
        Route::resource('strength', StrengthController::class);
        Route::resource('service', ServiceController::class);
        Route::resource('callToAction', CallToActionController::class);
        Route::resource('portfolio', PortfolioController::class);
        Route::resource('portfolioCategory', PortfolioCategoryController::class);
        Route::resource('team', TeamController::class);
        Route::resource('price', PriceController::class);
        Route::resource('faq', FaqController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('gallery', GalleryController::class);
        Route::resource('partner', PartnerController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('customPage', CustomPageController::class);
        Route::resource('subscriber', SubscriberController::class);
        Route::resource('websiteMessage', WebsiteMessageController::class);

        Route::post('/message-status-change', [WebsiteMessageController::class, 'messageStatusChange'])->name('messageStatusChange');
        Route::post('/message-reply-mail', [WebsiteMessageController::class, 'websiteMessageReplyMail'])->name('websiteMessageReplyMail');

        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('profile-password-update', [ProfileController::class, 'profilePasswordUpdate'])->name('profilePasswordUpdate');
        Route::post('profile-info-update', [ProfileController::class, 'profileInfoUpdate'])->name('profileInfoUpdate');
    });

