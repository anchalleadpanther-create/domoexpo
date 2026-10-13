<div class="modal fade" id="timeSlotModal" tabindex="-1" aria-labelledby="timeSlotModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="timeSlotModalLabel">Add new time slot</span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('buyer.time-slot.store') }}">
          @csrf
          <div class="mb-3">
            <select class="multiple-select-days" multiple required name="days[]">
              <option value="sunday">Sunday</option>
              <option value="monday">Monday</option>
              <option value="tuesday">Tuesday</option>
              <option value="wednesday">Wednesday</option>
              <option value="thursday">Thursday</option>
              <option value="friday">Friday</option>
              <option value="saturday">Saturday</option>
            </select>
          </div>
          <div class="mb-3">
            <select class="multiple-select-times" multiple required name="times[]">
              <option value="12:00:00">12:00 PM</option>
              <option value="13:00:00">1:00 PM</option>
              <option value="14:00:00">02:00 PM</option>
              <option value="15:00:00">03:00 PM</option>
              <option value="16:00:00">04:00 PM</option>
              <option value="17:00:00">05:00 PM</option>
              <option value="18:00:00">06:00 PM</option>
              <option value="19:00:00">07:00 PM</option>
              <option value="20:00:00">08:00 PM</option>
              <option value="21:00:00">09:00 PM</option>
              <option value="22:00:00">10:00 PM</option>
              <option value="23:00:00">11:00 PM</option>
              <option value="00:00:00">12:00 AM</option>
              <option value="01:00:00">1:00 AM</option>
              <option value="02:00:00">2:00 AM</option>
              <option value="03:00:00">3:00 AM</option>
              <option value="04:00:00">4:00 AM</option>
              <option value="05:00:00">5:00 AM</option>
              <option value="06:00:00">6:00 AM</option>
              <option value="07:00:00">7:00 AM</option>
              <option value="08:00:00">8:00 AM</option>
              <option value="09:00:00">9:00 AM</option>
              <option value="10:00:00">10:00 AM</option>
              <option value="11:00:00">11:00 AM</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
