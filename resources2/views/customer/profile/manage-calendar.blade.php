<div id="calendar" class="calendar tab-pane">
  <div class="row">
    <div class="col-md-8">
      <h3>Manage your calendar - Your Slots</h3>
    </div>
    <div class="col-md-4 text-right">
      <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#timeSlotModal"
        class="btn btn-small btn-outline-primary">
        <i class="icon an me-2 an-chevron-circle-left"></i>new slot
      </a>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12 shadow-sm py-3 rounded-3">
      <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
        <input type="radio" class="btn-check days-btn" value="{{ Str::lower(now()->format('l')) }}" name="btnradio"
          id="firstRadio" autocomplete="off" checked>
        <label class="btn btn-outline-info bg-light text-dark rounded-pill mx-1"
          for="firstRadio">{{ now()->format('l') }}</label>

        <input type="radio" class="btn-check days-btn" value="{{ Str::lower(now()->addDays(1)->format('l')) }}"
          name="btnradio" id="secondRadio" autocomplete="off">
        <label class="btn btn-outline-info bg-light text-dark rounded-pill mx-1"
          for="secondRadio">{{ now()->addDays(1)->format('l') }}</label>

        <input type="radio" class="btn-check days-btn" value="{{ Str::lower(now()->addDays(2)->format('l')) }}"
          name="btnradio" id="thirdRadio" autocomplete="off">
        <label class="btn btn-outline-info bg-light text-dark rounded-pill mx-1"
          for="thirdRadio">{{ now()->addDays(2)->format('l') }}</label>

        <input type="radio" class="btn-check days-btn" value="{{ Str::lower(now()->addDays(3)->format('l')) }}"
          name="btnradio" id="fourthRadio" autocomplete="off">
        <label class="btn btn-outline-info bg-light text-dark rounded-pill mx-1"
          for="fourthRadio">{{ now()->addDays(3)->format('l') }}</label>

        <input type="radio" class="btn-check days-btn" value="{{ Str::lower(now()->addDays(4)->format('l')) }}"
          name="btnradio" id="fifthRadio" autocomplete="off">
        <label class="btn btn-outline-info bg-light text-dark rounded-pill mx-1"
          for="fifthRadio">{{ now()->addDays(4)->format('l') }}</label>

        <input type="radio" class="btn-check days-btn" value="{{ Str::lower(now()->addDays(5)->format('l')) }}"
          name="btnradio" id="sixthRadio" autocomplete="off">
        <label class="btn btn-outline-info bg-light text-dark rounded-pill mx-1"
          for="sixthRadio">{{ now()->addDays(5)->format('l') }}</label>

        <input type="radio" class="btn-check days-btn" value="{{ Str::lower(now()->addDays(6)->format('l')) }}"
          name="btnradio" id="seventhRadio" autocomplete="off">
        <label class="btn btn-outline-info bg-light text-dark rounded-pill mx-1"
          for="seventhRadio">{{ now()->addDays(6)->format('l') }}</label>
      </div>

      <div class="scrollmenu mt-3 slots">
      </div>

    </div>

    <div class="col-md-12 shadow-sm py-3 rounded-3 w-100 mt-4">
      <div class="my-calendar w-100">

      </div>
    </div>
  </div>

</div>
<x-customer.time-slot-modal />
