<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Formatter;
use App\Models\Notification;
use App\Models\Role;
use App\Models\User;
use App\Notifications\Notifications;
use App\Traits\DeleteModelTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use function redirect;
use function view;

class AdminUserController extends Controller
{

    use DeleteModelTrait;

    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index(Request $request)
    {
        $query = $this->user->where('role_id', 4)->where('user_status_id', 1);

        foreach ($request->all() as $key => $item) {
            if ($key == "page" || $key == "topic_question_profile_finder_id_3") {
                continue;
            }
            if ($key == "start") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->whereDate('date_use_package_service', '>=', $item);
                }
            } else if ($key == "end") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->whereDate('date_use_package_service', '<=', $item);
                }
            } else if ($key == "address_born_id" || $key == "gender_id" || $key == "package_service_id") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where($key, $item);
                }
            } else if ($key == "date_of_birth") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->whereYear($key, $item);
                }
            } else if ($key == "number_pair") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where('number_pair', '>=', $item);
                }
            } else if ($key == "number_date_accept") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where('number_date_accept', '>=', $item);
                }
            } else if ($key == "number_date") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where('number_date', '>=', $item);
                }
            } else if ($key == "is_lover") {
                if ((!empty($item) || strlen($item) > 0) && $item == 'true') {
                    $query = $query->where('is_lover', 1);
                }
            }else if ($key == "order_package") {
                if ((!empty($item) || strlen($item) > 0) && $item == 'true') {
                    $query = $query->orderBy('package_service_id');
                }
            } else if (!empty($item) || strlen($item) > 0) {
                $query = $query->where($key, 'LIKE', "%{$item}%");
            }
        }

        $users = $query->latest('users.created_at')->get();

        $filtedResults = [];

        foreach ($users as $item) {
            $item['profile'] = $item->profilePairing($request, $item->id);

            $isFiled = true;

            if (isset($request->topic_question_profile_finder_id_3) && !empty($request->topic_question_profile_finder_id_3)) {
                try {
                    if (isset($item['profile']) && !empty($item['profile'])) {
                        if (count($item['profile']['data_questions']) && count($item['profile']['data_questions'][0]['answers'])) {
                            if ($item['profile']['data_questions'][2]['answers'][0]['id'] == $request->topic_question_profile_finder_id_3) {

                            } else {
                                $isFiled = false;
                            }
                        } else {
                            $isFiled = false;
                        }
                    } else {
                        $isFiled = false;
                    }
                } catch (\Exception $e) {
                    $isFiled = false;
                }
            }

            if ($isFiled) {
                $filtedResults[] = $item;
            }

        }

        $users = Formatter::paginator($request, $filtedResults);

        return view('administrator.user.index', compact('users'));
    }

    public function indexAccepted(Request $request)
    {
        $query = $this->user->where('role_id', 4)->where('user_status_id', 2);

        foreach ($request->all() as $key => $item) {
            if ($key == "page" || $key == "topic_question_profile_finder_id_3") {
                continue;
            }
            if ($key == "start") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->whereDate('date_use_package_service', '>=', $item);
                }
            } else if ($key == "end") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->whereDate('date_use_package_service', '<=', $item);
                }
            } else if ($key == "address_born_id" || $key == "gender_id" || $key == "package_service_id") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where($key, $item);
                }
            } else if ($key == "date_of_birth") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->whereYear($key, $item);
                }
            } else if ($key == "number_pair") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where('number_pair', '>=', $item);
                }
            } else if ($key == "number_date_accept") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where('number_date_accept', '>=', $item);
                }
            } else if ($key == "number_date") {
                if (!empty($item) || strlen($item) > 0) {
                    $query = $query->where('number_date', '>=', $item);
                }
            } else if ($key == "is_lover") {
                if ((!empty($item) || strlen($item) > 0) && $item == 'true') {
                    $query = $query->where('is_lover', 1);
                }
            }else if ($key == "order_package") {
                if ((!empty($item) || strlen($item) > 0) && $item == 'true') {
                    $query = $query->orderBy('package_service_id');
                }
            } else if (!empty($item) || strlen($item) > 0) {
                $query = $query->where($key, 'LIKE', "%{$item}%");
            }
        }

        $users = $query->latest('users.created_at')->paginate(10)->appends(request()->query());

        return view('administrator.user.accepted.index', compact('users'));
    }

    public function indexReport(Request $request)
    {
        $filterBasics[] = User::where('role_id', 4)->where('user_status_id', 1)->count();
        $filterBasics[] = User::where('role_id', 4)->where('user_status_id', 2)->where('number_date', '>', 0)->count();
        $filterBasics[] = User::where('role_id', 4)->where('user_status_id', 2)->where('is_lover', 1)->count();

        $filterPackages[] = User::where('role_id', 4)->where('user_status_id', 2)->where('package_service_id', 1)->count();
        $filterPackages[] = User::where('role_id', 4)->where('user_status_id', 2)->where('package_service_id', 2)->count();
        $filterPackages[] = User::where('role_id', 4)->where('user_status_id', 2)->where('package_service_id', 3)->count();

        $filterRatings = [
            0,
            0,
            0,
            0,
            0,
        ];
        $users = User::where('role_id', 4)->where('user_status_id', 2)->get();

        foreach ($users as $item) {
            if ($item->averageStar()['average_star'] <= 1){
                $filterRatings[0]++;
            }else if ($item->averageStar()['average_star'] <= 2){
                $filterRatings[1]++;
            }else if ($item->averageStar()['average_star'] <= 3){
                $filterRatings[2]++;
            }else if ($item->averageStar()['average_star'] <= 4){
                $filterRatings[3]++;
            }else if ($item->averageStar()['average_star'] <= 5){
                $filterRatings[4]++;
            }
        }

        return view('administrator.user.report.index', compact('filterBasics', 'filterPackages','filterRatings'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('administrator.user.add', compact('roles'));
    }

    public function store(UserAddRequest $request)
    {

        $user = $this->user->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_discord' => $request->user_discord,
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender ? 1 : 0,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('administrator.users.edit', ["id" => $user->id]);
    }

    public function edit($id)
    {
        $user = $this->user->find($id);
        return view('administrator.user.edit', compact('user'));
    }

    public function editAccepted($id)
    {
        $user = $this->user->find($id);
        return view('administrator.user.accepted.edit', compact('user'));
    }

    public function update(UserEditRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $updatetem = [];

            foreach ($request->all() as $key => $item) {
                if (strlen($item) == 0) continue;

                if ($key == "gender") {
                    $updatetem['gender'] = $item ? 1 : 0;
                } else if ($key == "email_verified_at") {
                    $updatetem['email_verified_at'] = $item ? now() : null;
                } else if ($key == "password") {
                    $updatetem['password'] = Hash::make($item);
                } else if (!empty($item) || strlen($item) > 0) {
                    $updatetem[$key] = $item;
                }
            }

            $this->user->find($id)->update($updatetem);

            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }

        return back();
    }

    public function updateStatus($id, Request $request)
    {
        $updateItem = [
            'user_status_id' => $request->user_status_id ? 2 : 1,
            'user_suggestion_id' => $request->user_suggestion_id ? 1 : 2,
            'user_agent_find_id' => $request->user_agent_find_id ? 2 : 1,
            'package_service_id' => $request->package_service_id,
            'is_lover' => $request->is_lover ? 1 : 0,
        ];

        if (isset($request->date_use_package_service)) {
            $updateItem['date_use_package_service'] = $request->date_use_package_service;
        }

        $user = $this->user->find($id);

        if (($request->user_status_id ? 2 : 1) == 1) {
            if ($user->user_status_id != 1){
                Notification::sendNotificationFirebase($id, "Admin đã từ chối hồ sơ của bạn, chắc có điều gì đó. Bạn có cần sự giúp đỡ không? Đi tới Website để xem lại các điều khoản hoặc liên hệ với chúng tôi qua Hotline", true);
                Notification::sendNotificationFirebase(1, "Admin đã từ chối duyệt hồ sơ cho $user->real_name", true);
            }
        } else if (($request->user_status_id ? 2 : 1) == 2) {
            if ($user->user_status_id != 2){
                Notification::sendNotificationFirebase(1, "Admin đã duyệt hồ sơ cho $user->real_name", true);
                Notification::sendNotificationFirebase($id, "Bạn đã được Admin duyệt hồ sơ thành công, hãy bắt đầu hành trình tìm kiếm tình yêu đích thực của bạn. Bạn có thể nhận được sự giúp đỡ của Admin bất kì lúc nào!", true);
            }
        }

        $user->update($updateItem);

        return back();

    }

    public function updateAccepted($id, Request $request)
    {

        $updateItem = [];

        if (isset($request->status_sale_id)) {
            $updateItem['status_sale_id'] = $request->status_sale_id;
        }

        if (isset($request->package_service_advise_id)) {
            $updateItem['package_service_advise_id'] = $request->package_service_advise_id;
        }

        if (isset($request->note_by_sale)) {
            $updateItem['note_by_sale'] = $request->note_by_sale;
        }

        $this->user->find($id)->update($updateItem);

        return response()->json([
            'message' => 'success',
            'code' => 200
        ]);

    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->user);
    }

    public function deleteProductOfUser($id)
    {
        return $this->deleteModelTrait($id, $this->productOfUser);
    }

    public function deleteTradingOfUser($id)
    {
        return $this->deleteModelTrait($id, $this->tradingOfUser);
    }

    public function deleteGift($id)
    {
        return $this->deleteModelTrait($id, $this->userGifts);
    }

    public function exportUser()
    {
        $search_query = "";
        $gender = "";
        $start = "";
        $end = "";
        $date_of_birth = "";

        if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
            $search_query = $_GET['search_query'];
        }

        if (isset($_GET['gender']) && (!empty($_GET['gender']) || strlen($_GET['gender']) > 0)) {
            $gender = $_GET['gender'];
        }

        if (isset($_GET['start']) && !empty($_GET['start'])) {
            $start = $_GET['start'];
        }

        if (isset($_GET['end']) && !empty($_GET['end'])) {
            $end = $_GET['end'];
        }

        if (isset($_GET['date_of_birth']) && !empty($_GET['date_of_birth'])) {
            $date_of_birth = $_GET['date_of_birth'];
        }

        return Excel::download(new UsersExport($search_query, $gender, $start, $end, $date_of_birth), 'Khách hàng.xlsx');
    }

    public function tradingOfUser($id)
    {

        $tradingOfUsers = $this->tradingOfUser->where('user_id', $id)->get();

        $datas = [];

        foreach ($tradingOfUsers as $tradingOfUserItem) {
            $datas[] = [
                "trading_id" => $tradingOfUserItem->trading->id,
                "real_price" => $tradingOfUserItem->trading->realPrice($tradingOfUserItem->trading->id) - $tradingOfUserItem->trading->realPriceUpgrade($tradingOfUserItem->trading->id, $id),
                "name" => $tradingOfUserItem->trading->name,
                "content" => $tradingOfUserItem->trading->content,
            ];
        }

        return response()->json([
            "code" => 200,
            "data" => $datas
        ]);
    }

    function sendEmail(Request $request)
    {
        $user = $this->user->where('email', $request->email_to)->first();
        $notificationData = [
            'body' => $request->contents,
        ];

        $user->notify(new Notifications($notificationData));

        return response()->json([
            "code" => 200,
            "message" => "success"
        ]);
    }

    public function changeSchoolYear($id, Request $request)
    {

        try {
            DB::beginTransaction();

            $userId = $request->user_id;
            $price = $request->price;
            $newProductId = $request->new_product_id;

            $productOfUser = $this->productOfUser->find($id);

            $oldInvoice = $this->invoice->find($productOfUser->invoice_id);

            $productIds = [
                "product_id" => [$newProductId],
                "combo_product_id" => [],
                "trading_id" => [],
            ];

            $priceIds = [
                "product_id" => [$price + (optional($oldInvoice)->price ?? 0)],
                "combo_product_id" => [],
                "trading_id" => [],
            ];

            $newInvoice = $this->invoice->create([
                'user_id' => $userId,
                'price' => $price + (optional($oldInvoice)->price ?? 0),
                'product_ids' => json_encode($productIds),
                'price_ids' => json_encode($priceIds),
                'content' => 'Chuyển đăng ký khóa học',
                'type_payment_id' => optional($oldInvoice)->type_payment_id ?? 0,
            ]);

            $this->productOfUser->create([
                'user_id' => $userId,
                'product_id' => $newProductId,
                'invoice_id' => $newInvoice->id,
                'created_at' => $productOfUser->created_at,
                'updated_at' => $productOfUser->updated_at,
            ]);

            $productOfUser->delete();
            optional($oldInvoice)->delete();


            DB::commit();

            return response()->json([
                "code" => 200,
                "message" => "success"
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . 'Line' . $exception->getLine());
        }
        return response()->json([
            "code" => 500,
            "message" => "error"
        ], 500);
    }
}
