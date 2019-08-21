<td>
    <p style='margin-left: 10%;'>{{ $item->description }} <span class='badge bg-blue'>{{ $item->unit_measurement }}</span> <span class='badge bg-yellow'>{{ $item->unit_cost }}</span></p>
</td>
<td>
    @foreach($division as $div)
    <li>{{ $div->division }}</li>
    <ul>
        <?php
            $section = \App\Qty::
                select("section.description as section","qty.division as division_id","qty.section as section_id","qty.created_by","qty.item_id")
                ->where("qty.item_id","=",$div->item_id)
                ->where("qty.division","=",$div->division_id)
                ->join('dts.section',"section.id","=","qty.section")
                ->groupBy("qty.section")
                ->get();
        ?>
        @foreach($section as $sec)
            <li >{{ $sec->section }}</li>
            <ul>
                <?php
                    $created_by = \App\Qty::
                        select(
                                \DB::raw("upper(concat(users.fname,' ',users.mname,' ',users.lname)) as name"),
                                \DB::raw("(qty.aug+qty.sep) as qty_total")
                        )
                        ->where("qty.item_id","=",$sec->item_id)
                        ->where("qty.section","=",$sec->section_id)
                        ->join('dts.users',"users.username","=","qty.created_by")
                        ->get();
                ?>
                @foreach($created_by as $user)
                    <li>{{ $user->name }} <span class='badge bg-green'>{{ $user->qty_total }}</span></li>
                @endforeach
            </ul>
        @endforeach
    </ul>
    @endforeach
</td>


