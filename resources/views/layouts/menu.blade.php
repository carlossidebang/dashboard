<li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="nav-item {{ Request::is('marriages*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('marriages.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Pernikahan</span>
    </a>
</li>
<li class="nav-item {{ Request::is('serviceCategories*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('serviceCategories.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Kategori Layanan</span>
    </a>
</li>
<li class="nav-item {{ Request::is('incomes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('incomes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Pendapatan</span>
    </a>
</li>
<li class="nav-item {{ Request::is('outcomes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('outcomes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Pengeluaran</span>
    </a>
</li>
<li class="nav-item {{ Request::is('adultBaptisms*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('adultBaptisms.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Sidi</span>
    </a>
</li>
<li class="nav-item {{ Request::is('congregations*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('congregations.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Jemaat</span>
    </a>
</li>
<li class="nav-item {{ Request::is('congregationDeaths*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('congregationDeaths.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Jemaat Meninggal</span>
    </a>
</li>
<li class="nav-item {{ Request::is('congregationOuts*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('congregationOuts.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Jemaat Pindah</span>
    </a>
</li>
