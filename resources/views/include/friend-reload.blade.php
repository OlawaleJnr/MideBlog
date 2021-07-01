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
      <button type="button" class="btn  btn-pill btn-outline-dark ml-auto waves-effect waves-float waves-light" style="padding-top: 9px; padding-bottom: 9px" onclick="processAction('{{ $user->id }}', 'unfollow', '{{ $user->id }}', '{{ $user->username }}')">
        <span style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Following</span>
      </button>
      @elseif(isFollowing($user->id) == "Followers")
      <button type="button" class="btn  btn-pill btn-outline-dark ml-auto waves-effect waves-float waves-light" style="padding-top: 9px; padding-bottom: 9px" onclick="processAction('{{ $user->id }}', 'remove', '{{ $user->id }}', '{{ $user->username }}')">
        <span style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Remove</span>
      </button>
      @else
        <button type="button" class="btn btn-pill btn-outline-primary ml-auto waves-effect waves-float waves-light" style="padding-top: 9px; padding-bottom: 9px"  onclick="processAction('{{ $user->id }}', 'follow', '{{ $user->id }}', '{{ $user->username }}')">
          <span style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Follow</span>
        </button>
    @endif
  </div>
@endforeach
