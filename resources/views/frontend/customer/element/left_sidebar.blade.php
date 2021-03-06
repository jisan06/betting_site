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
                <a class="nav-link {{\URL::current() == route('user.deposite') ? 'active' : ''}}" href="{{ route('user.deposite') }}">
                    <span class="text">
                        Deposit
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.withdraw') ? 'active' : ''}}" href="{{ route('user.withdraw') }}">
                    <span class="text">
                        Withdrawals
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.transfer') ? 'active' : ''}}" href="{{ route('user.transfer') }}">
                    <span class="text">
                        Transfers
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{\URL::current() == route('user.transaction') ? 'active' : ''}}" href="{{ route('user.transaction') }}">
                    <span class="text">
                        Transactions
                    </span>
                </a>
            </li>

            @if(Auth::guard('customer')->user()->club_owner_id != NULL)
                <li class="nav-item">
                    <a class="nav-link {{\URL::current() == route('user.clubUser') ? 'active' : ''}}" href="{{ route('user.clubUser') }}">
                        <span class="text">
                            Club User
                        </span>
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>