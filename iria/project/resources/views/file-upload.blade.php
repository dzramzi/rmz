<x-admin-layout>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    input[type="file"]::file-selector-button {
    display: none;
    }
    </style>
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
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="{{ route('admin.dashboard');}}">
                Home</a>
                <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
              </li>
              <li>Upload</li>
            </ul>
          </div>
          @if(session('status-alert'))
          <div class="alert flex rounded-lg bg-error px-4 py-4 text-white sm:px-5 sess_msg">
          {{ session('status-alert') }}
          </div>
          @elseif (session('status-success'))
          <div class="alert flex rounded-lg bg-success px-4 py-4 text-white sm:px-5 mb-3 sess_msg">
            {{ session('status-success') }}
          </div>
          @else

          @endif
          <div>

            <div class="card mt-3">
                <div
                  class="border-b border-slate-200 p-4 dark:border-navy-500 sm:px-5"
                >
                  <div class="flex items-center space-x-2">
                    <div
                      class="flex h-7 w-7 items-center justify-center rounded-lg bg-primary/10 p-1 text-primary dark:bg-accent-light/10 dark:text-accent-light"
                    >
                      <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <h4
                      class="text-lg font-medium text-slate-700 dark:text-navy-100"
                    >
                      Upload Files
                    </h4>
                  </div>
                </div>
                <form action="{{ route('uploadTheFile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4 p-4 sm:p-5">
                  <label class="block">
                    <span>Image name (optional)</span>

                    <input
                      class="form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                      placeholder="image name"
                      type="text"
                      name="file_name"
                      value=""
                    />

                  <div>

                <label style="height:43px;"
                    class="btn mt-3 relative bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                  >
                    <input  style="width:130px;"
                      tabindex="-1"
                      type="file"
                      name="attachment"
                    />
                    <div class="flex items-center space-x-2">
                      <i class="fa-solid fa-cloud-arrow-up text-base"></i>
                      <span>Choose File</span>
                    </div>
                  </label>

                  </div>
                  <div class="flex justify-center space-x-2 pt-4">
                    <a href="{{route('admin.dashboard')}}"
                      class="btn space-x-2 bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewbox="0 0 20 20"
                        fill="currentColor"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                          clip-rule="evenodd"
                        />
                      </svg>
                      <span>Back</span>
                    </a>
                    <button type="submit"
                      class="btn space-x-2 bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90"
                    >
                      <span>Upload</span>
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                      </svg>
                    </button>
                  </form>
                  </div>
                </div>
              </div>


            {{-- <div class="card mt-3 p-3">

                @forelse ($files as $file)
                {{$file->file_name}}
                <br>
                @empty
                No Images..
                @endforelse


            </div> --}}

            <div class="card mt-3">
                <div class="is-scrollbar-hidden min-w-full overflow-x-auto" x-data="pages.tables.initExample1">
                  <table class="is-hoverable w-full text-left">
                    <thead>
                      <tr>
                        <th class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          #
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Image
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Name
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Image Path
                        </th>
                        <th class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                          Delete
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                     @php $count = 0; @endphp
                     @foreach ($files as $file)
                     @php $count++; @endphp
                     <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                     <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{$count}}</td>
                     <td class="whitespace-nowrap px-4 py-3 sm:px-5">

                        <div class="avatar h-24 w-24">
                            <img
                              class="rounded-lg"
                              src="{{url('/storage/attachment',$file->file_name)}}"
                              alt="avatar"
                            />
                          </div>
                        </td>
                     <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{$file->file_name}}</td>
                     <td class="whitespace-nowrap px-4 py-3 sm:px-5">{{url('/storage/attachment',$file->file_name)}}</td>
                     <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                      <a href="delete-file/{{$file->id}}"
                        class="btn h-9 w-9 p-0 font-medium text-error hover:bg-error/20 focus:bg-error/20 active:bg-error/25"
                      >
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          class="h-5 w-5"
                          fill="none"
                          viewbox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                          />
                        </svg>
                    </a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="flex flex-col justify-between space-y-4 px-4 py-4 sm:flex-row sm:items-center sm:space-y-0 sm:px-5">

                  {{$files->links()}}

                </div>
              </div>


          </div>
    </main>

</x-admin-layout>
