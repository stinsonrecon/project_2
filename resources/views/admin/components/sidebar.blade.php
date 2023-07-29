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
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
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
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                      </svg>
                    </span>
                    <span class="ml-2 text-sm"> Quản lý tài khoản khách hàng </span>
                  </a>
                </div>

              </nav>

              <!-- Sidebar footer -->
              <div class="flex-shrink-0 px-2 py-4 space-y-2">
                <button @click="openSettingsPanel" type="button" class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
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
