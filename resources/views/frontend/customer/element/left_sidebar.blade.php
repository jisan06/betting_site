<div class="col-xl-2 col-lg-2">
    <div class="bett-menu">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.dashboard') ? 'active' : ''}}" 
                    href="{{ route('user.dashboard') }}">
                    <span class="text">
                        Dashboard
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.customerProfile') ? 'active' : ''}}"
                    href="{{ route('user.customerProfile') }}">
                    <span class="text">
                        Profile
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.betts') ? 'active' : ''}}" 
                    href="{{ route('user.betts') }}">
                    <span class="text">
                        Bet
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.deposite') ? 'active' : ''}}"href="{{ route('user.deposite') }}">
                    <span class="text">
                        Deposite
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.withdraw') ? 'active' : ''}}"href="{{ route('user.withdraw') }}">
                    <span class="text">
                        Withdrawals
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link">
                    <span class="text">
                        Transfers
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link">
                    <span class="text">
                        Transactions
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>