<!-- Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-4 bg-image" style="background-image: url(images/bg_3.jpg);"></div>
          <div class="col-lg-8 p-5">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <small>CLOSE </small><span aria-hidden="true">&times;</span>
            </button>
            <h1 class="mb-4">Reserve A Table</h1>
            <form action="{{ route('reservation') }}" method="post">
              @csrf
              <div class="row">

                <div class="col-md-6 form-group">
                  <label for="m_fname">First Name</label>
                  <input type="text" class="form-control" id="m_fname" name="name">
                </div>
                @if ($errors->has('name'))
                    <div class="alert alert-danger mt-12 col-sm-12">
                        <b>{{$errors->first('name')}}</b>
                    </div>
                @endif

                <div class="col-md-6 form-group">
                  <label for="m_lname">Last Name</label>
                  <input type="text" class="form-control" id="m_lname" name="surname">
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="m_email">Email</label>
                  <input type="email" class="form-control" id="m_email" name="email">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="m_people">How Many People</label>
                  <select name="numberOfPeople" id="m_people" class="form-control">
                    <option value="1">1 People</option>
                    <option value="2">2 People</option>
                    <option value="3">3 People</option>
                    <option value="4+">4+ People</option>
                  </select>
                </div>
                <div class="col-md-6 form-group">
                  <label for="m_phone">Phone</label>
                  <input type="text" class="form-control" id="m_phone" name="phone">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label for="m_date">Date</label>
                  <input type="text" class="form-control" id="m_date" name="date">
                </div>
                <div class="col-md-6 form-group">
                  <label for="m_time">Time</label>
                  <input type="text" class="form-control" id="m_time" name="time">
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="m_message">Message</label>
                  <textarea class="form-control" id="m_message" name="message" cols="30" rows="7"></textarea>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12 form-group">
                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Reserve Now">
                </div>
            </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- END Modal -->
