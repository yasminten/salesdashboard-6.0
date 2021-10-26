<?php
    use Carbon\Carbon;
?>
<div class="table-responsive {!! (! $expirings->isEmpty() ? 'panel-scroll' : '')  !!}">
    <table class="table table-hover table-condensed">
        @forelse($expirings as $expiring)
            <tr>
                

                <td>
                    <a href="{{ action('CustomersController@show',['id' => $expiring->customer->id]) }}">
                        <span class="table-sub-data">{{ $expiring->customer->member_code }}</span></a>
                    <a href="{{ action('CustomersController@show',['id' => $expiring->customer->id]) }}">
                        <span class="table-sub-data">{{ $expiring->customer->name }}</span></a>
                </td>
                <?php
                $daysLeft = Carbon::today()->diffInDays($expiring->end_date->addDays(1));
                ?>
                <td>
                    <span class="table-sub-data">{{ $expiring->end_date->format('Y-m-d') }}<br></span>
                    <span class="table-sub-data">{{ Carbon::today()->addDays($daysLeft)->diffForHumans() }}</span>
                </td>

                @permission(['manage-gymie','manage-subscriptions','renew-subscription'])
                <td>
                    <a class="btn btn-info btn-xs btn pull-right"
                       href="{{ action('SubscriptionsController@edit',['id' => $expiring->id]) }}">Renew</a>
                </td>
                @endpermission
            </tr>
        @empty
            <div class="tab-empty-panel font-size-24 color-grey-300">
                No Data
            </div>
        @endforelse
    </table>
</div>
<!-- @if(!$expirings->isEmpty())
    <a class="btn btn-color btn-xs palette-concrete pull-right margin-right-10 margin-top-10"
       href="{{ action('SubscriptionsController@expiring') }}">View All</a>
@endif -->