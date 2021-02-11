<div class="col-md-4 hidden-xs u-sm-paddingTop20">
    <aside class="sideBar styleOne rightSideBar">
        <!-- widget(newsLetter) -->
        <section class="widget newsLetterWidget styleOne u-whiteBg u-shadow-0x0x5--05">
            <h4 class="widgetTitle textDark text-center">Newsletter</h4>
            <div class="newsLetterWidget__body u-marginTop30 ff-openSans">
                @if(Session::has('msg'))
                    <div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ Session::get('msg') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>@foreach ($errors->all() as $error) {{ $error }}<br> @endforeach</div>
                @endif
                <p>{{__('labels.newslwtter_not_publish')}}</p>
                <form action="<?php echo URL::to('/newsletter'); ?>" method="post" class="newsLetterWidget__form">
                    @csrf
                    <input type="email" @error('email')style="border-color: red;"@enderror name="email" class="emailHunter u-borderRadius4" placeholder="{{__('labels.newslwtter_email_here')}}" value="{{ old('email') }}" autocomplete="off" autocapitalize="off" autocorrect="off" spellcheck="false">
                    <input type="submit" class="btnWidget u-borderRadius4" value="{{__('labels.subscribe')}}">
                </form>
            </div>
        </section>
        <!--// widget end -->
        @if(!empty($new))
            <section class="widget recentEventWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                <h4 class="widgetTitle textDark  text-center">{{__('labels.last_articals')}}</h4>
                <ul class="recentEventWidget__body u-marginTop30">

                    @foreach($new as $nw)
                        <li>
                            <div class="recentEventWidget__content">
                                <h3 class="  u-font17"><a class="textDark" href="<?php echo URL::to('/'); ?>/article/{{$nw->article_id}}">{{$nw->title}}</a></h3>
                                <ul class="recentEventWidget__date_vanue">
                                    <li class="recentEventWidget__date"><a href="<?php echo URL::to('/'); ?>/article/{{$nw->article_id}}">{{date('M d, Y',strtotime($nw->created_at))}}</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </section>
        @endif
        @if(!empty($last))
            <section class="widget recentEventWidget styleOne u-whiteBg u-shadow-0x0x5--05">
                <h4 class="widgetTitle textDark  text-center">{{__('labels.last_read_articals')}}</h4>
                <ul class="recentEventWidget__body u-marginTop30">

                    @foreach($last as $nw)
                        <li>
                            <div class="recentEventWidget__content">
                                <h3 class="  u-font17"><a class="textDark" href="<?php echo URL::to('/'); ?>/article/{{$last->article_id}}">{{$last->title}}</a></h3>
                                <ul class="recentEventWidget__date_vanue">
                                    <li class="recentEventWidget__date"><a href="<?php echo URL::to('/'); ?>/article/{{$last->article_id}}">{{$last->created_at}}</a></li>
                                    <li class="recentEventWidget__vanue u-relative"><a href="#">NYC, USA</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </section>
        @endif
    </aside>
</div> <!--// col-4 end(sideBar) -->
