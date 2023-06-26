<xf:title>{{$auction.Thread.title}}</xf:title>
<xf:pageaction if="$xf.visitor.user_id == $auction.Thread.user_id OR $xf.visitor.is_admin">
    <xf:button href="{{ link('auction/categories/delete', $auction) }}" overlay="true" class="button button--icon button--icon--edit" icon="delete">{{ phrase('delete') }}</xf:button>
    <xf:button href="{{ link('posts/'.{$auction.Thread.FirstPost.post_id}.'/edit') }}" class="button button--icon button--icon--edit" icon="edit">{{ phrase('edit') }}</xf:button>
    <xf:if is="$auction.Thread.auction_end_date > $xf.time">
        <xf:button href="{{ link('auction/categories/bumping', $auction) }}" class="button button--icon button--icon--add" icon="add">{{ phrase('fs_auction_bumping') }}</xf:button>
    </xf:if>
</xf:pageaction>

<xf:css src="message.less" />
<script>
    // For All Auctions
    function DateTimeConverter(unixdatetime) {

        var wStart_time = new Date(unixdatetime * 1000).toLocaleString("en-US", {
            hour12: false,
            //  timeZone: 'America/New_York',
            // timeZone:'Europe/London',
            timeStyle: "long",
        });
        var tempHumanDate = new Date(unixdatetime * 1000).toLocaleDateString("en-US", {
            timeZone: 'America/New_York',
            year: 'numeric',
            month: 'numeric',
            day: 'numeric',
        });

        var humanDate = new Date(tempHumanDate);
        var year = humanDate.getFullYear();
        var month = (humanDate.getMonth() + 1).toString().padStart(2, "0");
        var date = humanDate.getDate();

        var fulldate = year + "-" + month + "-" + date + " " + wStart_time + ":00";
        // FormatingDateEspecialyForIOS
        var tempCountTimmer = fulldate.split(/[- :]/);
        // Apply each element to the Date function
        var tempDateObject = new Date(
            tempCountTimmer[0],
            tempCountTimmer[1] - 1,
            tempCountTimmer[2],
            tempCountTimmer[3],
            tempCountTimmer[4],
            tempCountTimmer[5]
        );
        var CountDownDateTime = new Date(tempDateObject).getTime();

        return CountDownDateTime;
    }

    function timmerCounter(start_datetime) {



        let humanDateTime = DateTimeConverter(start_datetime);
        document.getElementById("auction-counter").style.display = "block";

        var countDownDate = new Date(humanDateTime).getTime();
        var counter = setInterval(function() {
            // Get today's date and time
            var now = new Date().getTime();
            // Find the distance between now and the count down date
            var timeDistance = countDownDate - now;
            document.getElementById("days-auction").innerHTML =
                Math.floor(timeDistance / (1000 60 60 * 24)) + " D";
            document.getElementById("hours-auction").innerHTML =
                Math.floor((timeDistance % (1000 60 60 24)) / (1000 60 * 60)) +
                " H";
            document.getElementById("minutes-auction").innerHTML =
                Math.floor((timeDistance % (1000 60 60)) / (1000 * 60)) + " M";
            document.getElementById("seconds-auction").innerHTML =
                Math.floor((timeDistance % (1000 * 60)) / 1000) + " S";

            // If the count down is over, write some text
            if (timeDistance < 0) {
                clearInterval(counter);
                document.getElementById("auction-counter").style.display = "none";

            }
        }, 1000);
    }
</script>

<header class="message-attribution message-attribution--split" style="color: #8c8c8c; font-size: 12px; padding-bottom: 3px; border-bottom: 1px solid #c9c9c9;">
    <ul class="message-attribution-main listInline {$mainClass}">
        <li class="u-concealed">
            <a href="{{ link('threads/post', $thread, {'post_id': $post.post_id}) }}" rel="nofollow">
                <xf:date time="{{$auction.Thread.post_date}}" itemprop="datePublished" />
            </a>
        </li>
    </ul>
    <ul class="message-attribution-opposite message-attribution-opposite--list {$oppositeClass}">

        <xf:if is="$auction.Thread.FirstPost.isUnread()">
            <li><span class="message-newIndicator">{{ phrase('new') }}</span></li>
            <xf:elseif is="$auction.Thread.isUnread()" />
            <li><span class="message-newIndicator" title="{{ phrase('new_replies') }}">{{ phrase('new') }}</span></li>
        </xf:if>

        <li>
            <a href="{{ link('auction/'.{$auction.category_id}.'/'.{$auction.auction_id}).'/view-auction' }}" class="message-attribution-gadget" data-xf-init="share-tooltip" data-href="{{ link('auction/share', $auction) }}" aria-label="{{ phrase('share')|for_attr }}" rel="nofollow">
                <xf:fa icon="fa-share-alt" />
            </a>
        </li>
        <li>
            <xf:macro template="bookmark_macros" name="link" arg-content="{$auction.Thread.FirstPost}" arg-class="message-attribution-gadget bookmarkLink--highlightable" arg-confirmUrl="{{ link('posts/bookmark', $auction.Thread.FirstPost) }}" arg-showText="{{ false }}" />
        </li>
        <li>
            <a href="{{ link('auction', $auction, {'auction_id': $auction.auction_id}) }}" rel="nofollow">
                #{{ $auction.auction_id }}
            </a>
        </li>
    </ul>
</header>

<!--- here--->
<xf:macro name="singleAuction" arg-auction="{$auction}" />


<xf:macro name="singleAuction" arg-auction="!">
    <xf:css src="structured_list.less" />
    <xf:css src="fs_auction_list_view.less" />

    <div class="structItem structItem--listing js-inlineModContainer">
        <div class="structItem-cell structItem-cell--main" data-xf-init="touch-proxy">

            <div class="message-fields message-fields--after">
                <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
                    <dt>{{ phrase('auction_endDate') }}</dt>
                    <dd>
                        {{$auction.Thread.getFormatedTime12()}}

                    </dd>
                </dl>

            </div>

            <div class="message-fields message-fields--after">

                <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
                    <dt>{{ phrase('auction_time_zone') }}</dt>
                    <dd>{{$auction.Thread.getStringReplace($auction.Thread.custom_fields.auction_Ends_At)}}</dd>
                </dl>
            </div>

            <div class="message-fields message-fields--after">

                <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
                    <dt>{{ phrase('starting_bid') }}</dt>
                    <dd>{{$auction.Thread.custom_fields.starting_bid}} {{phrase('dollorSymbol')}}</dd>
                </dl>

            </div>

            <div class="message-fields message-fields--after">

                <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
                    <dt>{{ phrase('bid_increments') }}</dt>
                    <dd>{{$auction.Thread.custom_fields.bid_increament}}</dd>
                </dl>

            </div>

            <div class="message-fields message-fields--after">

                <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
                    <dt>{{ phrase('payment_methods') }}</dt>
                    <dd>
                        <xf:foreach loop="$auction.Thread.custom_fields.payment_methods" value="$val">
                            <p style="margin:0px;">{$auction.Thread.getStringReplace($val)}</p>
                        </xf:foreach>
                    </dd>
                </dl>

            </div>

            <div class="message-fields message-fields--after">

                <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
                    <dt>{{ phrase('shippingTerms') }}</dt>
                    <dd>{{ $auction.Thread.getStringReplace($auction.Thread.custom_fields.shipping_term)}}</dd>
                </dl>

            </div>

            <div class="message-fields message-fields--after">

                <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
                    <dt>{{ phrase('shippingVia') }}</dt>
                    <dd>{{ $auction.Thread.getStringReplace($auction.Thread.custom_fields.ships_via) }}</dd>
                </dl>
            </div>



        </div>


        <div class="structItem-cell structItem-cell--listingMeta" style="width:320px">

            <div id="auction-counter" style="display:none;">

                <span class="label  label--blue label--counter-single" id="days-auction">
                    {{phrase('fs_auction_DD')}}
                </span>
                <span class="label  label--blue label--counter-single" id="hours-auction">
                    {{phrase('fs_auction_HH')}}
                </span>
                <span class="label  label--blue label--counter-single" id="minutes-auction">
                    {{phrase('fs_auction_MM')}}
                </span>
                <span class="label  label--blue label--counter-single" id="seconds-auction">
                    {{phrase('fs_auction_SS')}}
                </span>
            </div>

        </div>
    </div>
</xf:macro>
<div class="message-fields message-fields--after">

    <dl class="pairs pairs--columns pairs--fixedSmall pairs--customField" data-field="threadCustomField">
        <dt>{{ phrase('guidlines') }}</dt>
        <dd>{{ phrase('auction_guidlines_explain') }}</dd>
    </dl>

</div>
<xf:if is="$auction.Thread.auction_end_date > $xf.time">
    <img src="{{ count($auction.Thread.FirstPost.Attachments) ? link('full:attachments', $auction.Thread.FirstPost.Attachments.first()) : base_url('styles/FS/AuctionPlugin/no_image.png',true) }}" alt="{$attachment.filename}" width=" " onload="timmerCounter({$auction.Thread.auction_end_date})" style="width:-webkit-fill-available; width:-moz-available;" height="" loading="lazy" />
    <xf:else />
    <img src="{{ count($auction.Thread.FirstPost.Attachments) ? link('full:attachments', $auction.Thread.FirstPost.Attachments.first()) : base_url('styles/FS/AuctionPlugin/no_image.png',true) }}" alt="{$attachment.filename}" width=" " style="width:-webkit-fill-available; width:-moz-available;" height="" loading="lazy" />
</xf:if>

</div>

<div class="block-container">
    <div class="block-body">
        <xf:if is="count($bidding)">
            <h3 class="block-minorHeader"> {{phrase('fs_auction_top_bidding')}}</h3>

            <xf:datalist data-xf-init="responsive-data-list" style="border-bottom:1px solid #dfdfdf;">
                <xf:datarow rowtype="header">
                    <xf:cell> {{phrase('fs_auction_bidding_username')}} </xf:cell>
                    <xf:cell> {{phrase('fs_auction_bid_at')}} </xf:cell>
                    <xf:cell> {{phrase('fs_auction_bid_amount')}} </xf:cell>
                </xf:datarow>
                <xf:datarow>
                    <xf:cell href="{{ link('members/', $bidding) }}"> {{$bidding.{$highestBidId}.User.username}} </xf:cell>
                    <xf:cell>
                        <xf:date time="{{$bidding.{$highestBidId}.created_at}}" />
                    </xf:cell>
                    <xf:cell> {{$bidding.{$highestBidId}.bidding_amount}} </xf:cell>
                </xf:datarow>
            </xf:datalist>


        </xf:if>
        <xf:if is="$auction.Thread.auction_end_date > $xf.time AND $xf.visitor.user_id != 0">
            <xf:if is="$xf.visitor.user_id != $auction.Thread.User">
                <xf:form action="{{ link('auction/categories/bidding', $auction) }}" ajax="true" class="block" data-xf-init="attachment-manager">
                    <xf:formrow label="{{ phrase('BidCost') }}">

                        <!--bidDropDownRange value is  bid dropdown List items count-->

                        <xf:set var="$bidDropDownRange" value="{{range(0,$dropDownListLimit)}}" />

                        <div class="inputChoices">
                            <xf:radio name="use_biddingAmountTyp">
                                <xf:option label="{{ phrase('auctionDropdownBid') }}">
                                    <xf:dependent>
                                        <!--sum value is  bid increament+bidstart -->
                                        <xf:set var="$tempSum" value="{{$bidding.{$highestBidId}.bidding_amount  ? $bidding.{$highestBidId}.bidding_amount+$auction.Thread.custom_fields.bid_increament : $auction.Thread.custom_fields.bid_increament+$auction.Thread.custom_fields.starting_bid}}" />

                                        <xf:set var="$sum" value="{{$tempSum}}" />

                                        <xf:select name="bidding_amount">
                                            <xf:foreach loop="$bidDropDownRange" key="$key" value="$val">
                                                <xf:option value="{{$sum+$bidIncrementFromDb}}">{{$sum+$bidIncrementFromDb}}</xf:option>
                                                <xf:set var="$sum" value="{{$sum+$auction.Thread.custom_fields.bid_increament}}" />
                                            </xf:foreach>
                                        </xf:select>
                                    </xf:dependent>
                                </xf:option>
                                <xf:option label="{{ phrase('auctionCustomBid') }}" name="use_biddingAmountTyp">
                                    <xf:dependent>
                                        <xf:numberbox name="bidding_amount" value="{{$tempSum}}" min="{{$tempSum}}" label="{{ phrase('auctionCustomBid') }}" />
                                    </xf:dependent>

                                </xf:option>
                            </xf:radio>
                        </div>
                    </xf:formrow>
                    <xf:submitrow icon="save" sticky="true" />
                </xf:form>
                <xf:else />
                <div style="display:flex; justify-content: center; padding:0.7rem;">
                    <span>{{phrase('auctionOwnerCanNotBid')}}</span>
                </div>
            </xf:if>

            <xf:else />
            <div style="display:flex; justify-content: center; padding:0.7rem;">
                <span>{{phrase('biddingNotAllowed')}}</span>
            </div>

        </xf:if>
    </div>
</div>
</div>
</div>


<xf:if is="count($bidding)">
    <div class="block" style="margin-top:1rem;">
        <div class="block-container">
            <div class="block-body">
                <xf:datalist data-xf-init="responsive-data-list">
                    <xf:macro name="bidding_table_list" arg-bidding="{$bidding}" />
                </xf:datalist>

                <div class="block-outer block-outer--after">
                    <xf:showignored wrapperclass="block-outer-opposite" />
                </div>
            </div>
        </div>
    </div>
</xf:if>


<xf:macro name="bidding_table_list" arg-bidding="{$bidding}">
    <xf:datarow rowtype="header">
        <xf:cell> {{phrase('fs_auction_bidding_username')}} </xf:cell>
        <xf:cell> {{phrase('fs_auction_bid_at')}} </xf:cell>
        <xf:cell> {{phrase('fs_auction_bid_amount')}} </xf:cell>
    </xf:datarow>
    <xf:foreach loop="{$bidding}" value="$val">
        <xf:datarow>
            <xf:cell href="{{ link('members/', $val) }}"> {{$val.User.username}} </xf:cell>
            <xf:cell>
                <xf:date time="{{$val.created_at}}" />
            </xf:cell>
            <xf:cell> {{$val.bidding_amount}} </xf:cell>
        </xf:datarow>
    </xf:foreach>
</xf:macro>