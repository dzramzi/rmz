<x-header>

    <main class="main-content pos-app w-full px-[var(--margin-x)] pb-6 transition-all duration-[.25s]">
        <div class="mt-3 col-12">
            <div class="col-span-12 sm:col-span-6 lg:col-span-8">

                {{-- شريط الطلبات الحمراء (Red Requests) - بدون تغيير --}}
                <div class="swiper mt-3 swiper-initialized swiper-horizontal swiper-backface-hidden"
                    x-init="$nextTick(() => new Swiper($el, { slidesPerView: 'auto', spaceBetween: 8 }))">
                    <div class="swiper-wrapper" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);"
                        id="swiper-wrapper-598c411fdede8c28" aria-live="polite">
                        @foreach ($red_req as $req)
                            <div class="card swiper-slide relative flex w-40 flex-col overflow-hidden flex space-x-2 pd new_csm_rr lay_ lay-1"
                                data-id="id-{{ $req->id }}">
                                <div class="lay-img">
                                    <img class="st-a-img" src="images/app/app-coin.png" alt="">
                                </div>
                                <div class="flex flex-col items-center text-center">
                                    <p class="font-medium text-slate-700 dark:text-navy-100 lm-txt-ref">
                                        {{ substr($req->name, 0, 11) }}
                                    </p>
                                    <div class="flex w-full items-center gap-2">
                                        <span class="mt-0.5 text-xs text-slate-400 dark:text-navy-300">{{ $req->request_amount }}</span>
                                        <span class="flex w-full items-center gap-1 mt-0.5 text-xs text-slate-400 dark:text-navy-300">
                                            <img style="height: 14px;" src="images/app/app-coin.png">
                                            <span>{{ $req->points_used }}</span>
                                        </span>
                                    </div>
                                    <a class="lay-bt" href="javascript:void(0)">Start</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>

                <div class="is-scrollbar-hidden overflow-x-auto mt-8 offer-cat container-o">
                    <div class="flex w-max space-x-1.5 scroll-wrapper-i">
                        <a href="#" class="tag h-7 offer-cat-idol m-s2-ba">
                            All
                        </a>
                        <a href="#" class="tag h-7 offer-cat-idol m-s2-ba">
                            Games
                        </a>
                        <a href="#" class="tag h-7 offer-cat-idol m-s2-ba">
                            Apps
                        </a>
                        <a href="#" class="tag h-7 offer-cat-idol m-s2-ba">
                            Sign Up
                        </a>
                        <a href="#" class="tag h-7 offer-cat-idol m-s2-ba">
                            Survey
                        </a>
                    </div>
                </div>

           

                {{-- OfferWalls - بدون تغيير --}}
                <div class="app-data mt-3">
                    <div class="swiper swiper-initialized swiper-horizontal swiper-android swiper-backface-hidden" x-init="$nextTick(() => $el._x_swiper = new Swiper($el, { slidesPerView: 'auto', spaceBetween: 4, navigation: { nextEl: '.next-btn2', prevEl: '.prev-btn2' } }))">
                        <div class="flex items-center justify-between mt-5">
                            <p class="text-base font-medium text-slate-700 fea_text">
                                <i class="fa-solid fa-layer-group mr-1"></i> Offerwalls
                            </p>
                            <div class="flex" style="gap:6px;">
                                <button
                                    style="color: #93989f;border-color: transparent;border-radius: 10px;font-size: 12px;padding: 6px 9px; margin-top: 0px; height: 32px; width: 34px;"
                                    class="btn prev-btn2 h-7 w-7 bg-primary/10 dark:bg-accent-light/10 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>
                                <button
                                    style="color: #93989f;border-color: transparent;border-radius: 10px;font-size: 12px;padding: 6px 9px; margin-top: 0px; height: 32px; width: 34px;"
                                    class="btn next-btn2 h-7 w-7 bg-primary/10 dark:bg-accent-light/10 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="swiper-wrapper mt-3" x-data="{ selected: 'slide-2' }" id="swiper-wrapper-fc82fd4a9104a79df" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                            @foreach ($offers as $offer)
                                <div class="csm-offers loader-skl swiper-slide relative flex w-36 flex-col overflow-hidden shrink-0 cursor-pointer swiper-slide-active" role="group" aria-label="1 / {{ count($offers) }}" style="margin-right: 4px;">
                                    <a class="card image-containerA offer_card offer-backcolor p-2 of_mod csm-h" style="{{ $offer->back_col ?? 'border: 1px solid #09C16F; background-image: linear-gradient(180deg, #09C16F 0%, #07A55A 50%, #06874B 100%);' }}" href="javascript:void(0)" id="show-offer" data-id="{{ $offer->id }}">
                                        @if (!empty($offer->offer))
                                        <div class="of_b" style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                            <div class="offer-span of_b_1 text-white">
                                                {{ $offer->offer }}
                                            </div>
                                        </div>
                                        @endif
                                        <div class="con_1" style="padding-top: 30px;">
                                            <div class="flex justify-center mt-5">
                                                <h1 class="offer-h1 r-up text-white">{{ $offer->title }}</h1>
                                            </div>
                                            <div class="flex justify-center mt-4">
                                                <img class="w-img-of" src="{{ $offer->image }}" style="background-color:{{ $offer->color ?? '#09C16F' }};">
                                            </div>
                                            <div>
                                                <span class="flex justify-center text-star mt-3 text-warning space-x-0.5 text-sm lg:space-x-1 lg:text-base">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $offer->rate)
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                        @else
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                                <span class="mt-3.5 flex justify-center">
                                                    <span class="flex of-badge items-center gap-1 mt-0.5 text-xs text-slate-400 dark:text-navy-300" style="border: 1px solid #09C16F;">
                                                        <img style="height:14px;" src="images/app/app-coin.png">
                                                        <span class="font-medium ml-1 text-white">{{ rand(10, 200) }}K</span>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="play-backA"></div>
                                        <div class="play-iconA"></div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>

                {{-- Survey Walls - إصلاح أزرار التنقل لتكون مشابهة لـ FEATURED OFFERS وOfferwalls --}}
                <div class="app-data mt-3">
                    <div class="swiper swiper-initialized swiper-horizontal swiper-android swiper-backface-hidden" x-init="$nextTick(() => $el._x_swiper = new Swiper($el, { slidesPerView: 'auto', spaceBetween: 4, navigation: { nextEl: '.next-btn3', prevEl: '.prev-btn3' } }))">
                        <div class="flex items-center justify-between mt-5">
                            <p class="text-base font-medium text-slate-700 fea_text">
                                <i class="fa-solid fa-layer-group mr-1"></i> Survey
                            </p>
                            <div class="flex" style="gap:6px;">
                                <button
                                    style="color: #93989f;border-color: transparent;border-radius: 10px;font-size: 12px;padding: 6px 9px; margin-top: 0px; height: 32px; width: 34px;"
                                    class="btn prev-btn3 h-7 w-7 bg-primary/10 dark:bg-accent-light/10 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                    aria-label="Previous slide" aria-controls="swiper-wrapper-272410a98b071dcee">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </button>
                                <button
                                    style="color: #93989f;border-color: transparent;border-radius: 10px;font-size: 12px;padding: 6px 9px; margin-top: 0px; height: 32px; width: 34px;"
                                    class="btn next-btn3 h-7 w-7 bg-primary/10 dark:bg-accent-light/10 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 disabled:pointer-events-none disabled:select-none disabled:opacity-60 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25"
                                    aria-label="Next slide" aria-controls="swiper-wrapper-272410a98b071dcee">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                        <div class="swiper-wrapper mt-3" x-data="{ selected: 'slide-3' }" id="swiper-wrapper-272410a98b071dcee" aria-live="polite">
                            @foreach ($surveys as $offer)
                                <div class="csm-offers loader-skl swiper-slide relative flex w-36 flex-col overflow-hidden shrink-0 cursor-pointer" role="group" aria-label="{{ $loop->iteration }} / {{ count($surveys) }}" style="margin-right: 4px;">
                                    <a class="card image-containerA offer_card offer-backcolor p-2 of_mod csm-h" style="{{ $offer->back_col ?? 'border: 1px solid #09C16F; background-image: linear-gradient(180deg, #09C16F 0%, #07A55A 50%, #06874B 100%);' }}" href="javascript:void(0)" id="show-offer" data-id="{{ $offer->id }}">
                                        @if (!empty($offer->offer))
                                        <div class="of_b" style="position: absolute; top: 10px; left: 10px; z-index: 1;">
                                            <div class="offer-span of_b_1 text-white">
                                                {{ $offer->offer }}
                                            </div>
                                        </div>
                                        @endif
                                        <div class="con_1" style="padding-top: 30px;">
                                            <div class="flex justify-center mt-5">
                                                <h1 class="offer-h1 r-up text-white">{{ $offer->title }}</h1>
                                            </div>
                                            <div class="flex justify-center mt-4">
                                                <img class="w-img-of" src="{{ $offer->image }}" style="background-color:{{ $offer->color ?? '#09C16F' }};">
                                            </div>
                                            <div>
                                                <span class="flex justify-center text-star mt-3 text-warning space-x-0.5 text-sm lg:space-x-1 lg:text-base">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $offer->rate)
                                                            <i class="fa-solid fa-star text-warning"></i>
                                                        @else
                                                            <i class="fa-regular fa-star text-warning"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                                <span class="mt-3.5 flex justify-center">
                                                    <span class="flex of-badge items-center gap-1 mt-0.5 text-xs text-slate-400 dark:text-navy-300" style="border: 1px solid #09C16F;">
                                                        <img style="height:14px;" src="images/app/app-coin.png">
                                                        <span class="font-medium ml-1 text-white">{{ rand(10, 200) }}K</span>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="play-backA"></div>
                                        <div class="play-iconA"></div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                    </div>
                </div>

                {{-- Modal للعروض - بدون تغيير --}}
                <div id="of-modal" class="of-modal absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                    <div class="of-modal-content bg-slate-50 dark:bg-navy-900 border dark:border-navy-700 p-m border-slate-200 redu1">
                        <div class="flex justify-between bb-0 rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 bg-da-app sm:px-5 mob-nv">
                            <h3 id="of_title" class="text-base font-medium text-slate-700 dark:text-navy-100"></h3>
                            <div class="of-navi">
                                <a class="closeBtn tab-offer btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" target="_blank" href="">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                                <button class="closeBtn btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" id="close-csm">
                                    <i id="i-xmr" class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>
                        <div id="csm_lo_of"></div>
                        <div class="box_modal">
                            <iframe class="offeriframe" id="of_if" loading="lazy" src=""></iframe>
                        </div>
                    </div>
                </div>

                {{-- Modal API - بدون تغيير --}}
                <div id="of-api-modal" class="of-modal absolute inset-0 bg-slate-900/60 backdrop-blur transition-opacity duration-300" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                    <div class="of-modal-content bg-slate-50 dark:bg-navy-900 border dark:border-navy-700 p-m border-slate-200">
                        <div style="height: 100%;">
                            <div class="flex justify-between items-center redu1 rounded-t-lg bg-slate-200 px-4 py-3 dark:bg-navy-800 bg-da-app sm:px-5">
                                <div class="api-csm-title loader-skl-title mr-4">
                                    <div id="of_api_title" class="text-base font-medium text-slate-700 dark:text-navy-100"></div>
                                </div>
                                <div class="of-navi">
                                    <button class="closeBtn btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25" id="close-csm-api">
                                        <i id="i-xmr" class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="csm_lo_of"></div>
                            <div class="data-p">
                                <div class="offer-api p-4 box_modal">
                                    <div class="flex gap-4">
                                        <div class="api-csm-img loader-skl-api-img">
                                            <div class="h-28 w-28">
                                                <img id="csm_of_icon" class="rounded-lg" src="" />
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-2 mt-3 of-csm-con loader-skl-api-con">
                                            <div class="flex items-center gap-2 ti-1 csm-h">
                                                <div class="text-base font-medium text-slate-700 dark:text-navy-100"><i class="fa-solid fa-coins text-warning mr-1"></i><span id="api_coin">0</span></div>
                                                <div class="off_sp_btn off_sp_btn1 bg-green"></div>
                                            </div>
                                            <span class="text-xs+ line-clamp-3 text-left ti-2 csm-h">Provider: Adget</span>
                                            <div class="text-left ti-3 csm-h">
                                                <i class="fa-solid fa-ranking-star text-warning mr-1"></i>
                                                <span class="text-xs+" id="api_rank">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mt-4 p-3 text-left csm-ds">
                                        <h5 class="text-warning">Description</h5>
                                        <div class="csm_of_des loader-skl-title mt-2">
                                            <span id="of_api_desc" class="mt-2 text-xs+"></span>
                                        </div>
                                    </div>
                                    <div class="mt-3 text-left">
                                        <h5 class="text-white">Steps</h5>
                                        <div class="mt-2">
                                            <div class="flex items-center gap-2 api-step">
                                                <div class="h-2 w-2 rounded-full bg-green"></div>
                                                <span id="api_stp" class="loader-skl-title"></span>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="flex items-center gap-2 api-step">
                                                <div class="h-2 w-2 rounded-full bg-green"></div>
                                                <span id="cot" class="loader-skl-title"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a class="app-button api_url pro_log_btn" href="" target="_blank" style="background: linear-gradient(180deg, #09C16F 0%, #07A55A 50%, #06874B 100%); border-bottom: solid 2px #06874B;">START EARN</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</x-header>