<td>
    <p style='margin-left: 10%;'>{{ $item->description }} <span class='badge bg-blue'>{{ $item->unit_measurement }}</span> <span class='badge bg-yellow'>{{ $item->unit_cost }}</span></p>
</td>
<td>
    @foreach($division as $div)
        <li>{{ $div->division }}</li>
        <ul>
            <?php
                $item_id = $div->item_id;
                $unique_id = $div->unique_id;
                $section = \App\Qty::
                select(
                        "section.description as section",
                        "qty.division as division_id",
                        "qty.section as section_id",
                        "qty.created_by",
                        "qty.item_id"
                    )
                    ->where(function($q) use($item_id,$unique_id){
                        $q->where("qty.item_id","=",$item_id)
                            ->orWhere("qty.unique_id","=",$unique_id);
                    })
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
                            \DB::raw("(
                                        COALESCE(qty.jan,0)+
                                        COALESCE(qty.feb,0)+
                                        COALESCE(qty.mar,0)+
                                        COALESCE(qty.apr,0)+
                                        COALESCE(qty.may,0)+
                                        COALESCE(qty.jun,0)+
                                        COALESCE(qty.jul,0)+
                                        COALESCE(qty.aug,0)+
                                        COALESCE(qty.sep,0)+
                                        COALESCE(qty.oct,0)+
                                        COALESCE(qty.nov,0)+
                                        COALESCE(qty.dec,0)
                                       ) as qty_total")
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


