@extends('layouts.base')

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
											<li class="nav-item"><a href="" data-target="#people" data-toggle="tab" class="nav-link small text-uppercase active">People( {{ $users->count() }} )</a></li>
											<li class="nav-item"><a href="" data-target="#followers" data-toggle="tab" class="nav-link small text-uppercase">Followers</a></li>
											<li class="nav-item"><a href="" data-target="#following" data-toggle="tab" class="nav-link small text-uppercase">Following</a></li>
										</ul>
										
										<div id="tabsContent" class="tab-content"> 
											<div id="people" class="tab-pane fade active show">
												<div class="app-fixed-search d-flex align-items-center mt-4">
													<div class="d-flex align-content-center justify-content-between w-100">
														<div class="input-group input-group-merge">
															<div class="input-group-prepend">
																<span class="input-group-text">
																	<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-muted"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
																</span>
															</div>
															<form id="authorSearch">
																<input type="text" class="form-control" id="authorSearchInput" placeholder="Search For Authors" aria-label="Search..." aria-describedby="author-search">
															</form>
														</div>
													</div>
													<div class="dropdown">
														<a href="javascript:void(0);" class="dropdown-toggle hide-arrow mr-1" id="authorActions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-medium-2 text-body"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
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
																	<small class="text-muted">6 Mutual Friends</small>
																</div>
																@if(isFollowing($user->id) == "Following")
																	<button type="button" class="btn btn-outline-primary ml-auto waves-effect waves-float waves-light">
																		<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather mr-2 feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
																		<span>Following</span>
																	</button>
																@elseif(isFollowing($user->id) == "Followers")
																	<button type="button" class="btn btn-outline-success ml-auto waves-effect waves-float waves-light">
																		<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather mr-2 feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
																		<span>Follower</span>
																	</button>
																@else
																	<button type="button" class="btn btn-outline-danger ml-auto waves-effect waves-float waves-light">
																		<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather mr-2 feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
																		<span>Follow</span>
																	</button>
																@endif
															</div>
														@endforeach
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
									Content from the Wikipedia article <a href="https://github.com/OlawaleJnr" title="" target="_blank">Talabi Ayomide</a> 
								</h4>
								<p>
									Talabi Ayomide (Backend Developer) is responsible for implementing visual element that users see and interact with on Mide's Blog. He is also responsible for implementing web services and also integration of server-side logic used to interact on Mides's Blog.
									<span>Born:</span> Feburary 7, 2003 (age 18) 
									<span>Education:</span> Olabisi Onabanjo University (O.O.U), National Institute of Information technology (NIIT).
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
			axios.get("{{ route('searchAuthor') }}", {
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
	</script> 
@endsection