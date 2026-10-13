<?php



namespace App\Http\Controllers\Extensions;



use App\Traits\ApiResponser;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Extensions\Newsletter;

use Dotenv\Exception\ValidationException;
use Illuminate\Support\Facades\Mail;
use App\Mail\Customer\NewsLetterEmail;

use Spatie\Newsletter\Facades\Newsletter as MailChimpNewsletter;



class NewsletterController extends Controller

{

  use ApiResponser;

  /**

   * Display a listing of the resource.

   *

   * @return \Illuminate\Http\Response

   */

  public function index()

  {

    $newsletters = Newsletter::orderByDesc('id')->get();

    return view('extensions.newsletters-subscribers', compact('newsletters'));

  }



  /**

   * Show the form for creating a new resource.

   *

   * @return \Illuminate\Http\Response

   */

  public function create()

  {

    //

  }



  /**

   * Store a newly created resource in storage.

   *

   * @param  \Illuminate\Http\Request  $request

   * @return \Illuminate\Http\Response

   */

  public function store(Request $request)

  {

    try {

      $request->validate(['email' => 'required|email|unique:cpr_newsletters'], [
        'email.unique' => 'You have been already subscribed to our newsletters!',
      ]);

      Mail::to($request->only('email'))->send(new NewsLetterEmail([
        'email' => $request->only('email'),
      ]));

      $newsletter = Newsletter::create($request->only('email'));

    //   MailChimpNewsletter::subscribeOrUpdate($newsletter->email);
        return back()->with('success','You have successfully subscribed to our newsletter.');
        return $this->successResponse([], 'You have successfully subscribed to our newsletter.');

    } catch (ValidationException $th) {
        return back()->with('success', $th->getMessage());
        return $this->errorResponse([], $th->getMessage());
    } catch (\Throwable $th) {
        return back()->with('success', $th->getMessage());
        return $this->errorResponse([], $th->getMessage());
    }

  }



  /**

   * Display the specified resource.

   *

   * @param  \App\Models\Extensions\Newsletter  $newsletter

   * @return \Illuminate\Http\Response

   */

  public function show(Newsletter $newsletter)

  {

    //

  }



  /**

   * Show the form for editing the specified resource.

   *

   * @param  \App\Models\Extensions\Newsletter  $newsletter

   * @return \Illuminate\Http\Response

   */

  public function edit(Newsletter $newsletter)

  {

    //

  }



  /**

   * Update the specified resource in storage.

   *

   * @param  \Illuminate\Http\Request  $request

   * @param  \App\Models\Extensions\Newsletter  $newsletter

   * @return \Illuminate\Http\Response

   */

  public function update(Request $request, Newsletter $newsletter)

  {

    //

  }



  /**

   * Remove the specified resource from storage.

   *

   * @param  \App\Models\Extensions\Newsletter  $newsletter

   * @return \Illuminate\Http\Response

   */

  public function destroy(Newsletter $newsletter)

  {

    //

  }



  public function export()

  {

    // $appName = env('APP_NAME');

    // return Excel::download(new NewsletterUsersExport, "{$appName}-newsletter-users.xlsx");

  }

}

