@if($data->count() > 0)
  @foreach ($data as $follower)
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
      <button type="button" class="btn  btn-pill btn-outline-dark ml-auto waves-effect waves-float waves-light" style="padding-top: 9px; padding-bottom: 9px" onclick="processAction('{{ $follower->user1->id }}', 'remove', '{{ $follower->user1->id }}', '{{ $follower->user1->username }}')">
        <span style="font-family: Arial, Helvetica, sans-serif; font-size:12px;">Remove</span>
      </button>
    </div>
  @endforeach
@else
  <div>
    <p>You have no active follower.</p>
  </div>
@endif
