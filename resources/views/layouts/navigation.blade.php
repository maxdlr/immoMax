<nav>
    <!-- Primary Navigation Menu -->
    <div>
        <div style="display: flex; justify-content: space-between; height: 4rem;">
            <div style="display: flex;">

                <!-- Navigation Links -->
                <div>
                    <a href="{{ route('dashboard') }}"
                       style="{{ request()->routeIs('dashboard') ? 'font-weight: bold;' : '' }}">
                        Dashboard
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div style="display: flex; align-items: center;">
                <div>
                    <button onclick="toggleDropdown()" style="border: none; background: none;">
                        <span>{{ Auth::user()->name }}</span>
                        <svg style="width: 1rem; height: 1rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <div id="dropdown" style="display: none; position: absolute; right: 0;">
                        <a href="{{ route('profile.edit') }}">
                            Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </a>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Hamburger -->
            <div>
                <button onclick="toggleMobileMenu()" style="border: none; background: none;">
                    <svg id="hamburger-icon" style="width: 1.5rem; height: 1.5rem;" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="close-icon" style="display: none; width: 1.5rem; height: 1.5rem;"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div id="mobile-menu" style="display: none;">
        <div>
            <a href="{{ route('dashboard') }}"
               style="{{ request()->routeIs('dashboard') ? 'font-weight: bold;' : '' }}">
                Dashboard
            </a>
        </div>

        <!-- Responsive Settings Options -->
        <div>
            <div>
                <div>{{ Auth::user()->name }}</div>
                <div>{{ Auth::user()->email }}</div>
            </div>

            <div>
                <a href="{{ route('profile.edit') }}">
                    Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
    }

    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenu.style.display === 'none') {
            mobileMenu.style.display = 'block';
            hamburgerIcon.style.display = 'none';
            closeIcon.style.display = 'block';
        } else {
            mobileMenu.style.display = 'none';
            hamburgerIcon.style.display = 'block';
            closeIcon.style.display = 'none';
        }
    }
</script>
