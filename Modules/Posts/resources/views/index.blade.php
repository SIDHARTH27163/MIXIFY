<x-home-layout>
    <div class=" px-5 font-poppins max-w-7xl mx-auto my-5">
      @if (session('success'))
        <div class="text-sm text-green-600 bg-green-100 border border-green-200 rounded-md p-3 mb-5">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
    <div class="text-sm text-red-600 bg-red-100 border border-red-200 rounded-md p-3 mb-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      <div class="dark:bg-gray-900 p-5 rounded-lg flex flex-col md:flex-row gap-4 dark:text-white text-black">
    
        <div class=" flex-1 p-1">
              <div class="flex flex-col px-4 max-w-full my-2 dark:bg-gray-950 py-5 rounded-lg shadow-lg" role="article">
                  <div class="flex flex-wrap gap-10 w-full max-md:max-w-full  justify-between">
                    <div class="flex flex-1 gap-5">
                      <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/0ec4dbd676169ed6263db6d0f1e6cff377f2de5d56bdd3c03c241aefecf2f8c7?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                        class="object-contain shrink-0 rounded-full aspect-square w-[60px]"
                        alt="Profile picture of Jessica Alba"
                      />
                      <div class="flex flex-col my-auto">
                        <div class="flex gap-1.5 text-sm font-bold text-zinc-700 dark:text-zinc-300">
                          <div class="grow">Jessica Alba</div>
                          <img
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/7001b0d08124b690e4ccd92c8a7d6b80692c28a611439d0d063cff0eab9bcccc?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                            class="object-contain shrink-0 self-start aspect-[1.06] w-[18px]"
                            alt="Verification badge"
                          />
                        </div>
                        <div class="self-start text-base dark:text-stone-200 text-stone-700">@jessicaalba</div>
                      </div>
                    </div>
                    <div
                      class="flex flex-1 gap-2.5 items-end my-auto text-base justify-end  "
                    >
                      <div class="flex gap-1.5 items-center dark:text-white text-gray-700">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/e9dea6c0b8bde695fe982cb97099f4cc9c71a83070cfff1b2871063c91f8d693?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                          class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                          alt="Clock icon"
                        />
                        <time datetime="2024-03-24T16:00" class="self-stretch my-auto">March 24, 16 : 00 PM</time>
                      </div>
                      <button 
                        class="focus:outline-none focus:ring-2 focus:ring-indigo-800 rounded-full"
                        aria-label="More options"
                      >
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/35f41b42c690250be146bda232d4fcadac38b71c922c58f0f65282c4e6f4b73d?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                          class="object-contain shrink-0 w-5 aspect-square"
                          alt=""
                        />
                      </button>
                    </div>
                  </div>
                  <div class="self-start mt-4 text-md font-medium text-black dark:text-white font-ubuntu max-md:max-w-full">
                    Hi Guys, This is my cat collection from last summer. Share yours!
                  </div>
                  <div
                    class="flex relative flex-col justify-center items-center px-20 py-48 mt-2.5 min-h-[412px] max-md:px-5 max-md:py-24 max-md:max-w-full max-sm:max-w-[338px]"
                    role="img"
                    aria-label="Cat collection photo from last summer"
                  >
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/1b548fac5595b9664cd67206782c6f3a991c6e30445ad6fc29c61d7082b8dbc1?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                      class="object-cover absolute inset-0 size-full"
                      alt="Cat collection from last summer"
                    />
                    <button 
                      class="focus:outline-none focus:ring-2 focus:ring-indigo-800 rounded-full z-10"
                      aria-label="Expand image"
                    >
                      <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/770f6ca0ae0a21a8bc843ca3c213176d76611cd4530a0bcf524928a550dfd74c?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                        class="object-contain -mb-11 w-6 aspect-square max-md:mb-2.5"
                        alt=""
                      />
                    </button>
                  </div>
                  <div
                    class="flex gap-1.5 justify-center items-center self-start py-1.5 pr-3 pl-4 mt-4 text-xs font-light text-white whitespace-nowrap bg-indigo-800 rounded-[42px]"
                    role="status"
                  >
                    <div class="self-stretch my-auto">Posted</div>
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/da078527f4e94975d7e51a14083abe5a02541529b6d1f16286b8bbc23f0f2f8b?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                      class="object-contain shrink-0 self-stretch my-auto w-2 aspect-[1.33]"
                      alt=""
                    />
                  </div>
                </div>
                <div class="flex flex-col px-4 max-w-full my-2 dark:bg-gray-950 py-5 rounded-lg shadow-lg" role="article">
                  <div class="flex flex-wrap gap-10 w-full max-md:max-w-full  justify-between">
                    <div class="flex flex-1 gap-5">
                      <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/0ec4dbd676169ed6263db6d0f1e6cff377f2de5d56bdd3c03c241aefecf2f8c7?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                        class="object-contain shrink-0 rounded-full aspect-square w-[60px]"
                        alt="Profile picture of Jessica Alba"
                      />
                      <div class="flex flex-col my-auto">
                        <div class="flex gap-1.5 text-sm font-bold text-zinc-700 dark:text-zinc-300">
                          <div class="grow">Jessica Alba</div>
                          <img
                            loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/7001b0d08124b690e4ccd92c8a7d6b80692c28a611439d0d063cff0eab9bcccc?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                            class="object-contain shrink-0 self-start aspect-[1.06] w-[18px]"
                            alt="Verification badge"
                          />
                        </div>
                        <div class="self-start text-base dark:text-stone-200 text-stone-700">@jessicaalba</div>
                      </div>
                    </div>
                    <div
                      class="flex flex-1 gap-2.5 items-end my-auto text-base justify-end  "
                    >
                      <div class="flex gap-1.5 items-center dark:text-white text-gray-700">
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/e9dea6c0b8bde695fe982cb97099f4cc9c71a83070cfff1b2871063c91f8d693?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                          class="object-contain shrink-0 self-stretch my-auto w-5 aspect-square"
                          alt="Clock icon"
                        />
                        <time datetime="2024-03-24T16:00" class="self-stretch my-auto">March 24, 16 : 00 PM</time>
                      </div>
                      <button 
                        class="focus:outline-none focus:ring-2 focus:ring-indigo-800 rounded-full"
                        aria-label="More options"
                      >
                        <img
                          loading="lazy"
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/35f41b42c690250be146bda232d4fcadac38b71c922c58f0f65282c4e6f4b73d?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                          class="object-contain shrink-0 w-5 aspect-square"
                          alt=""
                        />
                      </button>
                    </div>
                  </div>
                  <div class="self-start mt-4 text-md font-medium text-black dark:text-white font-ubuntu max-md:max-w-full">
                    Hi Guys, This is my cat collection from last summer. Share yours!
                  </div>
                  <div
                    class="flex relative flex-col justify-center items-center px-20 py-48 mt-2.5 min-h-[412px] max-md:px-5 max-md:py-24 max-md:max-w-full max-sm:max-w-[338px]"
                    role="img"
                    aria-label="Cat collection photo from last summer"
                  >
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/1b548fac5595b9664cd67206782c6f3a991c6e30445ad6fc29c61d7082b8dbc1?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                      class="object-cover absolute inset-0 size-full"
                      alt="Cat collection from last summer"
                    />
                    <button 
                      class="focus:outline-none focus:ring-2 focus:ring-indigo-800 rounded-full z-10"
                      aria-label="Expand image"
                    >
                      <img
                        loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/770f6ca0ae0a21a8bc843ca3c213176d76611cd4530a0bcf524928a550dfd74c?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                        class="object-contain -mb-11 w-6 aspect-square max-md:mb-2.5"
                        alt=""
                      />
                    </button>
                  </div>
                  <div
                    class="flex gap-1.5 justify-center items-center self-start py-1.5 pr-3 pl-4 mt-4 text-xs font-light text-white whitespace-nowrap bg-indigo-800 rounded-[42px]"
                    role="status"
                  >
                    <div class="self-stretch my-auto">Posted</div>
                    <img
                      loading="lazy"
                      src="https://cdn.builder.io/api/v1/image/assets/TEMP/da078527f4e94975d7e51a14083abe5a02541529b6d1f16286b8bbc23f0f2f8b?placeholderIfAbsent=true&apiKey=c81a87a8b87043acac16b0e47d857063"
                      class="object-contain shrink-0 self-stretch my-auto w-2 aspect-[1.33]"
                      alt=""
                    />
                  </div>
                </div>
          </div>
          <div class=" lg:w-96 md:w-96 w-96 mx-auto p-4">
              <div class="w-full flex flex-col gap-y-2">
                  {{-- profile section --}}
                  <div class="flex flex-col gap-4 shadow-lg rounded-lg dark:bg-slate-950">
                      <div class="flex items-center space-x-3 justify-between px-3 py-2">
                          <div class="flex gap-x-2">
                              <div class="flex-shrink-0">
                                  <img
                                  class="h-16 w-16 rounded-full mx-auto object-cover"
                                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                  alt="profile woman" />
                              </div>
                              <div>
                                  <a href="/guleria_sid/" class="text-ls font-semibold dark:text-gray-100 text-gray-800 font-Roboto tracking-widest">guleria_sid</a>
                                  <p class="text-xs dark:text-gray-100 text-gray-700 font-poppins font-semibold leading-6 whitespace-nowrap">SIDHARTH SINGH GULERIA</p>
                              </div>
                          </div>
                          <div class="flex flex-col justify-end">
                          <a class="text-indigo-600">Switch</a>
                          </div>
                      </div>
                      
                  </div>
                  {{-- sujjected for you --}}
                  <div class="flex flex-col gap-4">
                      <div class="flex items-center space-x-3 justify-between px-1 py-2 text-sm">
                          <div class="flex gap-x-2">
                              
                              <div>
                                  <a href="/guleria_sid/" class=" font-normal dark:text-gray-200 text-gray-800 font-ubuntu tracking-widest ">suggested for you</a>
                                
                              </div>
                          </div>
                          <div class="flex flex-col justify-end">
                          <a class="text-indigo-600">see all</a>
                          </div>
                      </div>
                      
                  </div>
                  <div class="flex flex-col gap-4 dark:bg-white bg-gray-950 rounded-lg shadow-xl">
                      <div class="flex items-center space-x-3 justify-between px-3 py-2 ">
                          <div class="flex gap-x-2">
                              <div class="flex-shrink-0">
                                  <img
                                  class="h-16 w-16 rounded-full mx-auto object-cover"
                                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                  alt="profile woman" />
                              </div>
                              <div>
                                  <a href="/guleria_sid/" class="text-ls font-semibold dark:text-gray-900 text-gray-50 font-Roboto tracking-widest">guleria_sid</a>
                                  <p class="text-xs dark:text-gray-800 text-gray-100 font-poppins font-semibold leading-6 whitespace-nowrap">SIDHARTH SINGH GULERIA</p>
                              </div>
                          </div>
                          <div class="flex flex-col justify-end">
                          <a class="text-indigo-600">Follow</a>
                          </div>
                      </div>
                      
                  </div>
                  <div class="flex flex-col gap-4 dark:bg-white bg-gray-950 rounded-lg shadow-xl">
                      <div class="flex items-center space-x-3 justify-between px-3 py-2 ">
                          <div class="flex gap-x-2">
                              <div class="flex-shrink-0">
                                  <img
                                  class="h-16 w-16 rounded-full mx-auto object-cover"
                                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                  alt="profile woman" />
                              </div>
                              <div>
                                  <a href="/guleria_sid/" class="text-ls font-semibold dark:text-gray-900 text-gray-50 font-Roboto tracking-widest">guleria_sid</a>
                                  <p class="text-xs dark:text-gray-800 text-gray-100 font-poppins font-semibold leading-6 whitespace-nowrap">SIDHARTH SINGH GULERIA</p>
                              </div>
                          </div>
                          <div class="flex flex-col justify-end">
                          <a class="text-indigo-600">Follow</a>
                          </div>
                      </div>
                      
                  </div>
                  <div class="flex flex-col gap-4 dark:bg-white bg-gray-950 rounded-lg shadow-xl">
                      <div class="flex items-center space-x-3 justify-between px-3 py-2 ">
                          <div class="flex gap-x-2">
                              <div class="flex-shrink-0">
                                  <img
                                  class="h-16 w-16 rounded-full mx-auto object-cover"
                                  src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                                  alt="profile woman" />
                              </div>
                              <div>
                                  <a href="/guleria_sid/" class="text-ls font-semibold dark:text-gray-900 text-gray-50 font-Roboto tracking-widest">guleria_sid</a>
                                  <p class="text-xs dark:text-gray-800 text-gray-100 font-poppins font-semibold leading-6 whitespace-nowrap">SIDHARTH SINGH GULERIA</p>
                              </div>
                          </div>
                          <div class="flex flex-col justify-end">
                          <a class="text-indigo-600">Follow</a>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
      </div>
    </div>
</x-home-layout>
