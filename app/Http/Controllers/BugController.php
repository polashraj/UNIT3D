<?php
/**
 * NOTICE OF LICENSE
 *
 * UNIT3D is open-sourced software licensed under the GNU General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 * @author     HDVinnie
 */

namespace App\Http\Controllers;

use App\Group;
use App\User;
use App\Mail\Bug;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Mail;

use \Toastr;

class BugController extends Controller
{

    /**
     * Bug Report
     *
     *
     * @access public
     * @return view::make bug.bug
     */
    public function bug()
    {
        // Fetch owner account
        $user = User::where('id', '=', '3')->first();

        if (Request::getMethod() == 'POST') {
            $input = Request::all();

            Mail::to($user->email, $user->username)->send(new Bug($input));

            Toastr::success('Your Bug Was Succefully Sent!', 'Success', ['options']);
        }
        return view('bug.bug');
    }
}
