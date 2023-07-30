        <!-- Sidebar -->
        <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
            <div class="flex flex-col h-full">
              <!-- Sidebar links -->
              <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                  <!-- Dashboards links -->
                  <div x-data="{ isActive:{{ request()->is('admin/home') || request()->is('admin') ? 'true' : 'false' }}, open:{{ request()->is('admin/home') || request()->is('admin') ? 'true' : 'false' }} }">
                      <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                      <a href="{{ route('admin.home') }}" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                          <span aria-hidden="true">
                              <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                              </svg>
                          </span>
                          <span class="ml-2 text-sm"> Trang chủ </span>
                      </a>
                  </div>

                  {{-- Role/Permission --}}
                  @if(auth()->user()->can('role manager') || auth()->user()->can('permission manager') || auth()->user()->can('admin manager'))
                      <div x-data="{ isActive:{{ request()->is('admin/management/*') ? 'true' : 'false' }}, open:{{ request()->is('admin/management/*') ? 'true' : 'false' }} }">
                          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                          <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                              <span aria-hidden="true">
                                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  </svg>
                              </span>
                              <span class="ml-2 text-sm"> Quản lý hệ thống </span>
                              <span aria-hidden="true" class="ml-auto">
                                  <!-- active class 'rotate-180' -->
                                  <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                              </span>
                          </a>
                          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                              <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                              <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                              @can('role manager')
                                  <a href="{{ route('admin.role.index') }}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                      Quản lý chức vụ
                                  </a>
                              @endcan
                              @can('permission manager')
                                  <a href="{{ route('admin.permission.index') }}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                      Quản lý quyền
                                  </a>
                              @endcan
                              @can('admin manager')
                                  <a href="{{ route('admin.adminList.index') }}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                                      Quản lý tài khoản nhân viên
                                  </a>
                              @endcan
                          </div>
                      </div>
                  @endif
                  {{-- Role/Permission --}}

                  <div x-data="{ isActive:{{ request()->is('admin/bank/*') || request()->is('admin/bank') ? 'true' : 'false' }}, open:{{ request()->is('admin/bank/*') || request()->is('admin/bank') ? 'true' : 'false' }} }">
                      <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                      <a href="{{ route('admin.bank.index') }}" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                      <span aria-hidden="true">
                          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                      </span>
                      <span class="ml-2 text-sm"> Tài khoản ngân hàng </span>
                      </a>
                  </div>

                  @role('admin|super admin')
                      <div x-data="{ isActive: {{ request()->is('admin/estate/*') ? 'true' : 'false' }}, open: {{ request()->is('admin/estate/*') ? 'true' : 'false' }}}">
                          <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                          <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                              <span aria-hidden="true">
                                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                  </svg>
                              </span>
                              <span class="ml-2 text-sm"> Quản lý bất động sản </span>
                              <span aria-hidden="true" class="ml-auto">
                                  <!-- active class 'rotate-180' -->
                                  <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                  </svg>
                              </span>
                          </a>
                          <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                          <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                          <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                          <a href="{{ route('admin.house.index') }}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                              Quản lý nhà/chung cư
                          </a>
                          <a href="{{ route('admin.land.index') }}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                              Quản lý đất
                          </a>
                          </div>
                      </div>
                  @endrole

                  {{-- News --}}
                  <div x-data="{ isActive:{{ request()->is('admin/estate_news/*') ? 'true' : 'false' }}, open:{{ request()->is('admin/estate_news/*') ? 'true' : 'false' }} }">
                      <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                      <a href="#" @click="$event.preventDefault(); open = !open" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                      <span aria-hidden="true">
                          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                          </svg>
                      </span>
                      <span class="ml-2 text-sm"> Tin đăng bất động sản </span>
                      <span aria-hidden="true" class="ml-auto">
                          <!-- active class 'rotate-180' -->
                          <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                      </span>
                      </a>
                      <div x-show="open" class="mt-2 space-y-2 px-7" role="menu" aria-label="Authentication">
                      <!-- active & hover classes 'text-gray-700 dark:text-light' -->
                      <!-- inActive classes 'text-gray-400 dark:text-gray-400' -->
                      @if(auth()->user()->can('create news_type') || auth()->user()->can('edit news_type') || auth()->user()->can('delete news_type'))
                          <a href="{{ route('admin.typeOfNews.index') }}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                              Loại tin đăng
                          </a>
                      @endif
                      <a href="{{ route('admin.news.index') }}" role="menuitem" class="block p-2 text-sm text-gray-400 transition-colors duration-200 rounded-md dark:hover:text-light hover:text-gray-700">
                          Tin đăng
                      </a>

                      </div>
                  </div>
                  {{-- End news --}}

                <div x-data="{ isActive:{{ request()->is('admin/customer_manager/*') || request()->is('admin/customer_manager') ? 'true' : 'false' }}, open:{{ request()->is('admin/customer_manager/*') || request()->is('admin/customer_manager') ? 'true' : 'false' }} }">
                  <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                  <a href="{{ route('admin.customer.index') }}" class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary" :class="{'bg-primary-100 dark:bg-primary': isActive || open}" role="button" aria-haspopup="true" :aria-expanded="(open || isActive) ? 'true' : 'false'">
                    <span aria-hidden="true">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                    <span class="ml-2 text-sm"> Quản lý tài khoản khách hàng </span>
                  </a>
                </div>

              </nav>

              <!-- Sidebar footer -->
              <div class="flex-shrink-0 px-2 py-4 space-y-2">
                <button @click="openSettingsPanel" type="button" class="flex items-center px-4 py-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary justify-center w-full focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                  <span aria-hidden="true">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                    </svg>
                  </span>
                  <span>Customize</span>
                </button>
              </div>
            </div>
          </aside>
