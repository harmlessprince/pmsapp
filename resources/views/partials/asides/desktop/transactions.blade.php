<div class="mb-8 cursor-pointer">
    <div onclick="toggleTransaction()" id="dropdownNavbarLink" class="flex flex-row relative">
        <img src="{{asset('assets/images/transaction.png')}}" alt="dashboard" class="mr-4"/>
        <span class="text-natural text-base font-medium">Transactions</span>
        <img src="{{asset('assets/images/dropdown.png')}}" alt="dashboard"
             class="mr-4 w-3 h-1.5 absolute right-0 bottom-2"/>
    </div>
    <div id="dropdownTransaction" class="hidden">
        <ul class="">
            <li>
                <a href="{{route('company.scans.transactions')}}"
                   class="block pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color">Scan
                    Transactions</a>
            </li>
            <li>
                <a  href="{{route('company.attendance.transactions')}}"
                   class="block  pl-[16%] pt-2 text-natural font-headerWeight text-normal hover:text-primary_color">Attendance
                    Transactions</a>
            </li>
        </ul>
    </div>
</div>
