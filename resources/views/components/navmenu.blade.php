<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="/" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
        <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Sejarah</a></li>
                <li><a href="#">Visi misi</a></li>
                <li><a href="#">Tupoksi</a></li>
                <li><a href="#">SDM</a></li>
                <li><a href="https://dpupr.bantaengkab.go.id/geoportal2" target="_blank">Peta</a></li>
                <li><a href="#">Galeri</a></li>
            </ul>
        </li>
        <li><a href="/berita" class="{{ request()->routeIs('berita.*') ? 'active' : '' }}">Berita</a></li>
        <li><a href="#">Peraturan</a></li>
        {{-- <li><a href="#team">Team</a></li>
        <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                    class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
                <li><a href="#">Dropdown 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Deep Dropdown 1</a></li>
                        <li><a href="#">Deep Dropdown 2</a></li>
                        <li><a href="#">Deep Dropdown 3</a></li>
                        <li><a href="#">Deep Dropdown 4</a></li>
                        <li><a href="#">Deep Dropdown 5</a></li>
                    </ul>
                </li>
                <li><a href="#">Dropdown 2</a></li>
                <li><a href="#">Dropdown 3</a></li>
                <li><a href="#">Dropdown 4</a></li>
            </ul>
        </li> --}}
        <li><a href="/contact" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
