<x-admin-layout>
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
        <div class="flex items-center space-x-4 py-5 lg:py-6">
            <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                Admin
            </h2>
            <div class="hidden h-full py-1 sm:flex">
                <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
            </div>
            <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                <li class="flex items-center space-x-2">
                    <a class="text-white transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                        href="{{ route('admin.dashboard') }}">
                        Home</a>
                    <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </li>
                <li>Settings</li>
            </ul>
        </div>

        @if (session('status'))
            <div class="alert flex rounded-lg bg-success px-4 py-4 text-white sm:px-5">
                {{ session('status') }}
            </div>
            <br>
        @endif

        <div x-data="{ activeTab: 'tabHome' }" class="tabs flex flex-col">
            <div
                class="is-scrollbar-hidden overflow-x-auto rounded-lg bg-slate-200 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                <div class="tabs-list flex px-1.5 py-1">
                    <button @click="activeTab = 'tabHome'"
                        :class="activeTab === 'tabHome' ? 'bg-red text-white shadow' :
                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                        class="btn shrink-0 space-x-2 px-3 py-1.5 font-medium">
                        <i class="fa-solid fa-gear"></i>
                        <span> General </span>
                    </button>
                    <button @click="activeTab = 'tabProfile'"
                        :class="activeTab === 'tabProfile' ? 'bg-red text-white shadow' :
                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                        class="btn shrink-0 space-x-2 px-3 py-1.5 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Profile</span>
                    </button>

                    <button @click="activeTab = 'social'"
                        :class="activeTab === 'social' ? 'bg-red text-white shadow' :
                            'hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                        class="btn shrink-0 space-x-2 px-3 py-1.5 font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>social Media</span>
                    </button>

                </div>
            </div>
            <div class="tab-content pt-4">
                <div x-show="activeTab === 'tabHome'" x-transition:enter="transition-all duration-500 easy-in-out"
                    x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                    x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                    <div class="card">
                        <div class="tab-content p-4 sm:p-5">
                            <form method="POST" action="{{ route('admin.update_settings') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="space-y-5">
                                    <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">
                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Site Seo
                                                Title:</span>
                                            <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="title" type="text" name="seo_title"
                                                value="{{ $settings->site_name }}">
                                        </label>


                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Favicon icon
                                                url:</span>
                                            <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Favicon url" type="text" name="favicon"
                                                value="{{ $settings->fav_icon }}">
                                        </label>

                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Site Logo
                                                url:</span>
                                            <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Logo url" type="text" name="site_logo"
                                                value="{{ $settings->site_logo }}">
                                        </label>

                                        <label class="block">
                                            <span class="font-medium text-slate-600 dark:text-navy-100">Site Short
                                                Title:</span>
                                            <input
                                                class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Site Short Title" type="text" name="short_title"
                                                value="{{ $settings->short_title }}">
                                        </label>
                                    </div>

                                    <label class="block">
                                        <span>Enter Tags:</span>
                                        <input class="mt-1.5 w-full" x-init="$el._tom = new Tom($el, {
                                            plugins: ['remove_button'],
                                            create: true,
                                            onItemRemove: function(val) {
                                                $notification({ text: `${val} removed` })
                                            }
                                        })" placeholder="Site Keywords"
                                            type="text" name="seo_keywords" value="{{ $settings->site_keywords }}" />
                                    </label>

                                    <label class="block">
                                        <span>Site Seo Description:</span>
                                        <textarea rows="4" placeholder=" seo description" name="seo_desc"
                                            class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            style="height:65px;">{{ $settings->site_desc }}</textarea>
                                    </label>

                                    <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

                                    <label class="block">
                                        <span>Sidebar Download App Url:</span>
                                        <textarea rows="4" placeholder="app url" name="app_url"
                                            class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            style="height:65px;">{{ $settings->app_url }}</textarea>
                                    </label>

                                    <label class="block">
                                        <span>Set $1 Points Value</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="$1 = 1000 Points For Example" type="number"
                                            name="dollar_value" value="{{ $settings->dollar_value }}">
                                    </label>

                                    <label class="block">
                                        <span>Contact Email</span>
                                        <input
                                            class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="email" type="email" name="c_email"
                                            value="{{ $settings->contact_email }}">
                                    </label>

                                    <label class="block">
                                        <span>Footer Copyright</span>
                                        <textarea rows="4" placeholder="Copyright" name="copyright"
                                            class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            style="height:65px;">{{ $settings->copyright }}</textarea>
                                    </label>


                                </div>

                        </div>
                        <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

                        <div class="p-4 pt-0">
                            <button type="submit"
                                class="btn space-x-2 bg-red font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                <span>Save</span>
                                <i class="fa-solid fa-floppy-disk"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'tabProfile'" x-transition:enter="transition-all duration-500 easy-in-out"
                x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                <div class="card">
                    <div class="tab-content p-4 sm:p-5">
                        <form method="POST" action="{{ route('admin.ad_update_settings') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="flex flex-col">
                                    <div class="avatar mt-1.5 h-20 w-20">
                                        <img class="mask is-squircle" src="{{ $admin_data->profile }}"
                                            alt="avatar">
                                    </div>
                                </div>
                                <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>
                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">

                                    <label class="block">
                                        <span>Full Name </span>
                                        <span class="relative mt-1.5 flex">
                                            <input
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Enter full name" type="text" name="name"
                                                value="{{ $admin_data->name }}">
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <i class="fa-regular fa-user text-base"></i>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="block">
                                        <span>Email Address </span>
                                        <span class="relative mt-1.5 flex">
                                            <input
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Enter email address" type="email" name="email"
                                                value="{{ $admin_data->email }}">
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <i class="fa-regular fa-envelope text-base"></i>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="block">
                                        <span>Profile Image url</span>
                                        <span class="relative mt-1.5 flex">
                                            <input
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="Enter full name" type="text" name="profile"
                                                value="{{ $admin_data->profile }}">
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <i class="fa-regular fa-user text-base"></i>
                                            </span>
                                        </span>
                                    </label>
                                </div>

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 mt-3">

                                    <label class="block">
                                        <span>Password</span>
                                        <span class="relative mt-1.5 flex">
                                            <input
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="" type="password" name="new_password" value="">
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary">
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                        </span>
                                    </label>
                                    <label class="block">
                                        <span>Confirm Password</span>
                                        <span class="relative mt-1.5 flex">
                                            <input
                                                class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                                placeholder="" type="password" name="new_confirm_password"
                                                value="">
                                            <span
                                                class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                                <i class="fa-solid fa-lock"></i>
                                            </span>
                                        </span>
                                    </label>
                                </div>

                                <div>

                                </div>
                            </div>
                            <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

                            <div class="flex justify-end space-x-2">
                                <button type="submit"
                                    class="btn space-x-2 bg-red font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <span>Save</span>
                                    <i class="fa-solid fa-floppy-disk"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'social'" x-transition:enter="transition-all duration-500 easy-in-out"
                x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]">
                <div class="card">
                    <div class="tab-content p-4 sm:p-5">
                        <form method="POST" action="{{ route('admin.social_up') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="grid grid-cols-1 gap-2 sm:grid-cols-2">

                                @foreach ($social_media as $media)
                                <label class="block">
                                    <span>{{ $media->title }} @if($media->status==0) <div class="badge ml-1 bg-warning/10 text-warning">Inactive</div> @else <div class="badge ml-1 bg-success/10 text-success">Active</div> @endif</span>
                                    <div class="flex items-center gap-3">
                                    <input class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400
                                     focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" type="url" name="{{ $media->title }}_url"
                                     value="{{ $media->url }}">
                                     <input
                                     class="form-switch h-5 w-10 rounded-lg bg-slate-300 before:rounded-md before:bg-slate-50 checked:bg-primary checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:bg-accent dark:checked:before:bg-white"
                                     type="checkbox" name="{{ $media->title }}_st" @if($media->status==1) checked @endif>
                                     <input type="hidden" name="{{ $media->title }}_id" value="{{ $media->id }}">
                                    </div>
                                </label>
                                @endforeach
                            </div>
                            <div class="my-7 h-px bg-slate-200 dark:bg-navy-500"></div>

                            <div class="flex justify-end space-x-2">
                                <button type="submit"
                                    class="btn space-x-2 bg-red font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                    <span>Save</span>
                                    <i class="fa-solid fa-floppy-disk"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        </div>


    </main>
</x-admin-layout>
