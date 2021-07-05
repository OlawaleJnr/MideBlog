@extends('layouts.base', compact('notification'))

@section('title')
<title>Mide's Blog | Find Authors</title>
@endsection

@section('content')
<div class="axil-tech-post-banner pt--30 bg-color-grey">
  <div class="container">
    <div class="row">
      <div class="row">
        <div class="col-lg-10">
          <div class="author-discovery">
            <section class="container py-4">
              <div class="row">
                <div class="col-md-12">
                  <ul id="tabs" class="nav nav-tabs nav-justified">
                    <li class="nav-item"><a href="" data-target="#people" data-toggle="tab"
                        class="nav-link small text-uppercase active">People( {{ $users->count() }} )</a></li>
                    <li class="nav-item"><a href="" data-target="#followers" data-toggle="tab"
                        class="nav-link small text-uppercase">Followers</a></li>
                    <li class="nav-item"><a href="" data-target="#following" data-toggle="tab"
                        class="nav-link small text-uppercase">Following</a></li>
                  </ul>

                  <div id="tabsContent" class="tab-content">
                    {{-- People --}}
                    <div id="people" class="tab-pane fade active show">
                      <div class="app-fixed-search d-flex align-items-center mt-4">
                        <div class="d-flex align-content-center justify-content-between w-100">
                          <div class="input-group input-group-merge">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                  stroke-linejoin="round" class="feather feather-search text-muted">
                                  <circle cx="11" cy="11" r="8"></circle>
                                  <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                              </span>
                            </div>
                            <form id="authorSearch" autocomplete="false">
                              <input type="text" class="form-control" id="authorSearchInput"
                                placeholder="Search For Friends" aria-label="Search..."
                                aria-describedby="author-search">
                            </form>
                          </div>
                        </div>
                        <div class="dropdown">
                          <a href="javascript:void(0);" class="dropdown-toggle hide-arrow mr-1" id="authorActions"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-more-vertical font-medium-2 text-body">
                              <circle cx="12" cy="12" r="1"></circle>
                              <circle cx="12" cy="5" r="1"></circle>
                              <circle cx="12" cy="19" r="1"></circle>
                            </svg>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="authorActions">
                            <a class="dropdown-item sort-asc" href="javascript:void(0)">Sort A - Z</a>
                            <a class="dropdown-item sort-desc" href="javascript:void(0)">Sort Z - A</a>
                            <a class="dropdown-item" href="javascript:void(0)">Sort Assignee</a>
                            <a class="dropdown-item" href="javascript:void(0)">Sort Due Date</a>
                            <a class="dropdown-item" href="javascript:void(0)">Sort Today</a>
                            <a class="dropdown-item" href="javascript:void(0)">Sort 1 Week</a>
                            <a class="dropdown-item" href="javascript:void(0)">Sort 1 Month</a>
                          </div>
                        </div>
                      </div>
                      <div class="scrollbar-inner">
                        <div class="scrollbar-inner_2">
                          <div id="authorSearchResult">
                            @foreach($users as $user)
                            <div class="d-flex justify-content-start align-items-center mt-4 author-list-left-25">
                              <div class="avatar mr-75">
                                <img src="{{ $user->picture }}" alt="avatar" height="40" width="40">
                              </div>
                              <div class="profile-user-info">
                                <h6 class="mb-0">{{ $user->name }}</h6>
                                <small class="text-muted">
                                  @if(checkUserPermission(['user']))
                                  User
                                  @elseif (checkUserPermission(['author']))
                                  Author
                                  @endif
                                </small>
                              </div>
                              @if(isFollowing($user->id) == "Following")
                              <button type="button"
                                class="btn  btn-pill btn-outline-dark ml-auto waves-effect waves-float waves-light"
                                style="padding-top: 9px; padding-bottom: 9px"
                                onclick="processAction('{{ $user->id }}', 'unfollow', '{{ $user->id }}', '{{ $user->username }}')">
                                <span
                                  style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Following</span>
                              </button>
                              @elseif(isFollowing($user->id) == "Followers")
                              <button type="button"
                                class="btn  btn-pill btn-outline-dark ml-auto waves-effect waves-float waves-light"
                                style="padding-top: 9px; padding-bottom: 9px"
                                onclick="processAction('{{ $user->id }}', 'remove', '{{ $user->id }}', '{{ $user->username }}')">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Remove</span>
                              </button>
                              @else
                              <button type="button"
                                class="btn btn-pill btn-outline-primary ml-auto waves-effect waves-float waves-light"
                                style="padding-top: 9px; padding-bottom: 9px"
                                onclick="processAction('{{ $user->id }}', 'follow', '{{ $user->id }}', '{{ $user->username }}')">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Follow</span>
                              </button>
                              @endif
                            </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- Followers --}}
                    <div id="followers" class="tab-pane fade">
                      <div class="scrollbar-inner">
                        <div class="scrollbar-inner_2">
                          <div id="followers_refresh">
                            @if($followers->count() > 0)
                            @foreach ($followers as $follower)
                            <div class="d-flex justify-content-start align-items-center mt-4 author-list-left-25">
                              <div class="avatar mr-75">
                                <img src="{{ $follower->user1->picture }}" alt="avatar" height="40" width="40">
                              </div>
                              <div class="profile-user-info">
                                <h6 class="mb-0">{{ $follower->user1->name }}</h6>
                                <small class="text-muted">
                                  @if(checkUserPermission(['user']))
                                  User
                                  @elseif (checkUserPermission(['author']))
                                  Author
                                  @endif
                                </small>
                              </div>
                              <button type="button"
                                class="btn  btn-pill btn-outline-dark ml-auto waves-effect waves-float waves-light"
                                style="padding-top: 9px; padding-bottom: 9px"
                                onclick="processAction('{{ $follower->user1->id }}', 'remove', '{{ $follower->user1->id }}', '{{ $follower->user1->username }}')">
                                <span style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Remove</span>
                              </button>
                            </div>
                            @endforeach
                            @else
                            <div>
                              <p>You have no active follower.</p>
                            </div>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>

                    {{-- Following--}}
                    <div id="following" class="tab-pane fade">
                      <div class="scrollbar-inner">
                        <div class="scrollbar-inner_2">
                          <div id="following_refresh">
                            @if($followings->count() > 0)
                            @foreach ($followings as $following)
                            <div class="d-flex justify-content-start align-items-center mt-4 author-list-left-25">
                              <div class="avatar mr-75">
                                <img src="{{ $following->user2->picture }}" alt="avatar" height="40" width="40">
                              </div>
                              <div class="profile-user-info">
                                <h6 class="mb-0">{{ $following->user2->name }}</h6>
                                <small class="text-muted">
                                  @if(checkUserPermission(['user']))
                                  User
                                  @elseif (checkUserPermission(['author']))
                                  Author
                                  @endif
                                </small>
                              </div>
                              <button type="button"
                                class="btn  btn-pill btn-outline-dark ml-auto waves-effect waves-float waves-light"
                                style="padding-top: 9px; padding-bottom: 9px"
                                onclick="processAction('{{ $following->user2->id }}', 'unfollow', '{{ $following->user2->id }}', '{{ $following->user2->username }}')">
                                <span
                                  style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Following</span>
                              </button>
                            </div>
                            @endforeach
                            @else
                            <div>
                              <p>You have currently not following anyone.</p>
                            </div>
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <div class="col-lg-2">
          <aside class="sidebar-find-author">
            <div class="wiki-box">
              <h4>
                <img src="{{ asset('assets/images/wiki.png') }}" alt="">
                Content from the Wikipedia article <a href="https://github.com/OlawaleJnr" title=""
                  target="_blank">Talabi Ayomide</a>
              </h4>
              <p>
                Talabi Ayomide (Backend Developer) is responsible for implementing visual element that users see and
                interact with on Mide's Blog. He is also responsible for implementing web services and also integration
                of server-side logic used to interact on Mides's Blog.
                <span>Born:</span> Feburary 7, 2003 (age 18)
                <span>Education:</span> Olabisi Onabanjo University (O.O.U), National Institute of Information
                technology (NIIT).
              </p>
              <div class="helpful">
                <span>Was this information helpful?</span>
                <ul class="add-remove-frnd">
                  <li class="add-tofrndlist">
                    <a href="#" title="Add friend"><i class="fa fa-thumbs-up"></i></a>
                  </li>
                  <li class="remove-frnd">
                    <a href="#" title="Send Message"><i class="fa fa-thumbs-down"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- <div class="advertisment-box stick-widget" style="">
								<h4 class="">advertisment</h4>
								<figure><a href="#" title=""><img src="{{ asset('assets/images/ad-baner.jpg') }}" alt=""></a></figure>
							</div> -->
          </aside>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
            $('.scrollbar-inner').scrollbar();
        });
</script>
<script>
  $(document).on('keyup', '#authorSearch', function(event) {
			event.preventDefault();
			let data = $('#authorSearchInput').val();
			axios.get("{{ route('searchFriend') }}", {
				params : {
					term : data,
				}
			})
			.then((data) => {
				$('#authorSearchResult').html(data.data);
			})
			.catch((err) => {
				console.log(err);
			})
		});

    // Fuction to process follow, unfollow logic
    function processAction(selector, action, user_id, username)
    {
			let message = '';
      let header = '';
      let yes = '';
      let no = '';
			if(action == "remove") {
        header = "Attention!";
				message = "Mide's Blog won't tell @"+username+" they were removed from your followers.";
        yes = "Remove";
        no = "Cancel";
			}else if(action == "unfollow") {
        header = "Unfollow!"
        message = "Unfollow @"+username+"?";
        yes = "Unfollow";
        no = "Cancel";
      }else{
        header = "Follow User";
        message = "Are you sure you want to follow @"+username;
        yes = "Follow";
        no = "Cancel";
      }
			Notiflix.Confirm.Show(
				header,
				message,
				yes,
				no,
				function() {
					// Yes
					axios.get("{{ route('processFollowshipAction') }}", {
						params: {
							action : action,
							user_id : user_id
						}
					})
					.then((data) => {
            if (action == "remove") {
              $('#followers_refresh').html(data.data);
              reloadFriends();
            }else if(action == "unfollow") {
              $('#following_refresh').html(data.data);
              reloadFriends();
            }else{
              $('#following_refresh').html(data.data);
              reloadFriends();
            }
					})
					.catch((err) => {
						console.log(err);
					})
				},
				function() {
					// No Button callback alert
				}
			);
    }

    function reloadFriends()
    {
      axios.get("{{ route('processFollowshipAction') }}", {
        params: {
          action : 'reload_friends'
        }
      })
      .then((data) => {
       $('#authorSearchResult').html(data.data);
      })
      .catch((err) => {
        console.log(err);
      })
    }

    const reloadFollowers = () => {
      axios.get("{{ route('reloadFollowers') }}")
      .then((data) => {
        $('#followers_refresh').html(data.data);
      })
      .catch((err) => {
        console.log(err);
      })
    }
</script>
@endsection
