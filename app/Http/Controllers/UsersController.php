<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;


class UsersController extends Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Keenthemes API",
     *      description="Keenthemes products Mock API",
     * )
     * 
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Keenthemes server"
     * )

     *
     * @OA\Tag(
     *     name="Users",
     *     description="API Endpoints of Users"
     * )
     * 
     * 
     */

    public $users;
    public $properties = ["id", "name", "email", "position", 'role', 'last_login', 'two_steps', 'joined_day', 'online'];

    function __construct() {
        $this->users = [
            [
                'id' => 1,
                'name' => 'Emma Smith', 
                'avatar' => 'avatars/300-6.jpg', 
                'email' => 'e.smith@kpmg.com.au', 
                'position' => 'Art Director',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],
            [
                'id' => 2,
                'name' => 'Melody Macy', 
                'initials' => ['label' => 'M', 'state' => 'danger'],
                'email' => 'melody@altbox.com', 
                'position' => 'Marketing Analytic',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],        
            [
                'id' => 3,
                'name' => 'Max Smith', 
                'avatar' => 'avatars/300-1.jpg', 
                'email' => 'max@kt.com', 
                'position' => 'Software Enginer',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],    
            [
                'id' => 4,
                'name' => 'Sean Bean', 
                'avatar' => 'avatars/300-5.jpg', 
                'email' => 'sean@dellito.com', 
                'position' => 'Web Developer',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],
            [
                'id' => 5,
                'name' => 'Brian Cox', 
                'avatar' => 'avatars/300-25.jpg', 
                'email' => 'brian@exchange.com', 
                'position' => 'UI/UX Designer',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => false,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],
            [
                'id' => 6,
                'name' => 'Melody Macy', 
                'initials' => ['label' => 'C', 'state' => 'warning'],
                'email' => 'mikaela@pexcom.com', 
                'position' => 'Head Of Marketing',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 7,
                'name' => 'Francis Mitcham', 
                'avatar' => 'avatars/300-9.jpg', 
                'email' => 'f.mitcham@kpmg.com.au', 
                'position' => 'Software Arcitect',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],
            [
                'id' => 8,
                'name' => 'Melody Macy', 
                'initials' => ['label' => 'O', 'state' => 'danger'],
                'email' => 'olivia@corpmail.com', 
                'position' => 'System Admin',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 9,
                'name' => 'Neil Owen', 
                'initials' => ['label' => 'N', 'state' => 'primary'],
                'email' => 'owen.neil@gmail.com', 
                'position' => 'Account Manager',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 10,
                'name' => 'Dan Wilson', 
                'avatar' => 'avatars/300-23.jpg', 
                'email' => 'dam@consilting.com', 
                'position' => 'Web Desinger',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],
            [
                'id' => 11,
                'name' => 'Emma Bold', 
                'initials' => ['label' => 'E', 'state' => 'danger'],
                'email' => 'emma@intenso.com', 
                'position' => 'Corporate Finance',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 12,
                'name' => 'Ana Crown', 
                'avatar' => 'avatars/300-12.jpg', 
                'email' => 'ana.cf@limtel.com', 
                'position' => 'Customer Relationship',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],
            [
                'id' => 13,
                'name' => 'Robert Doe', 
                'initials' => ['label' => 'A', 'state' => 'info'],
                'email' => 'robert@benko.com', 
                'position' => 'Marketing Executive',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 14,
                'name' => 'John Miller', 
                'avatar' => 'avatars/300-13.jpg', 
                'email' => 'miller@mapple.com', 
                'position' => 'Project Manager',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => false
            ],
            [
                'id' => 15,
                'name' => 'Lucy Kunic', 
                'initials' => ['label' => 'L', 'state' => 'success'],
                'email' => 'lucy.m@fentech.com', 
                'position' => 'SEO Master',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 16,
                'name' => 'Ethan Wilder', 
                'avatar' => 'avatars/300-21.jpg', 
                'email' => 'ethan@loop.com.au', 
                'position' => 'Accountant',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 17,
                'name' => 'Ethan Wilder', 
                'avatar' => 'avatars/300-21.jpg', 
                'email' => 'ethan@loop.com.au', 
                'position' => 'Accountant',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 18,
                'name' => 'Ethan Wilder', 
                'avatar' => 'avatars/300-21.jpg', 
                'email' => 'ethan@loop.com.au', 
                'position' => 'Accountant',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 19,
                'name' => 'Ethan Wilder', 
                'avatar' => 'avatars/300-21.jpg', 
                'email' => 'ethan@loop.com.au', 
                'position' => 'Accountant',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 20,
                'name' => 'Ethan Wilder', 
                'avatar' => 'avatars/300-21.jpg', 
                'email' => 'ethan@loop.com.au', 
                'position' => 'Accountant',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ],
            [
                'id' => 21,
                'name' => 'Ethan Wilder', 
                'avatar' => 'avatars/300-21.jpg', 
                'email' => 'ethan@loop.com.au', 
                'position' => 'Accountant',
                'role' => 'Administrator',
                'last_login' => 'Yesterday',
                'two_steps' => true,
                'joined_day' => "15 Apr 2022, 2:40 pm",
                'online' => true
            ]
        ];
    }

    /**
     * @OA\Get(
     *     path="/user/{id}",
     *     tags={"Users"},
     *     description="Get user by id.",
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="User by provided id.", @OA\JsonContent()),
     *     @OA\Response(response="404", description="User with the provided id is not found.", @OA\JsonContent())
     * )
     */
    function getUser(String $id){
        $user = null;

        foreach ($this->users as $object) {
            if($object["id"] == $id){
                $user = $object;
            }
        }

        if(!$user){
            return response(["message" => "User with id ".$id." is not found."], 404);
        }

        return response(["data"=>$user], 200);
    }

    /**
     * @OA\Put(
     *     path="/user",
     *     tags={"Users"},
     *     description="Add new user.",
     *     @OA\Parameter(
     *          name="name",
     *          description="User name.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="avatar",
     *          description="User avatar image path.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          description="User email address.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="position",
     *          description="User position.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(response="422", description="Not all required fileds are provided.", @OA\JsonContent()),
     *     @OA\Response(response="200", description="User has been successfully added.", @OA\JsonContent())
     * )
     */
    function addUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255',
            'position'      => 'required|string|max:255',
        ]);

        $newUser = $request->all();

        $newUser["id"] = count($this->users)+1;

        array_push($this->users, $newUser);

        return response(["data" => $newUser], 200);
    }

    /**
     * @OA\Post(
     *     path="/user/{id}",
     *     tags={"Users"},
     *     description="Update user info by id.",
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="name",
     *          description="User name.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="avatar",
     *          description="User avatar image path.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="email",
     *          description="User email address.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="position",
     *          description="User position.",
     *          in="query",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(response="422", description="Not all required filed are provided.", @OA\JsonContent()),
     *     @OA\Response(response="200", description="Users data has been successfully updated.", @OA\JsonContent())
     * )
     */
    function updateUser(Request $request, String $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255',
            'position'      => 'required|string|max:255',
        ]);

        foreach ($this->users as $object) {
            if($object["id"] == $id){
                $user["name"] = $request->all()["name"];
                $user["avatar"] = $request->all()["avatar"];
                $user["email"] = $request->all()["email"];
                $user["position"] = $request->all()["position"];
            }
        }

        return response(["data" => $request->all()], 200);
    }


    /**
     * @OA\Delete(
     *     path="/user/{id}",
     *     tags={"Users"},
     *     description="Delete user by id.",
     *     @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(response="200", description="User has been successfully deleted.", @OA\JsonContent()),
     *     @OA\Response(response="404", description="User with provided id is not found.", @OA\JsonContent())
     * )
     */
    function deleteUser($id){
        $userFound = false;
        $usersCollection = collect($this->users);
        foreach($usersCollection as $key => $item){
            if($item['id'] == $id){
                $userFound = true;
                unset($usersCollection[$key]);
            }
        }

        if(!$userFound){
            return response(["message" => "User with id ".$id." is not found."], 404);
        }

        return response(200);
    }

    /**
     * @OA\Get(
     *     path="/users/query",
     *     tags={"Users"},
     *     description="Get user query.",
     *     @OA\Parameter(
     *          name="page",
     *          description="Pagination current page",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="items_per_page",
     *          description="Items per page",
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="search",
     *          description="Search key.",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="sort",
     *          description="Sort label.",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="order",
     *          description="Sort order asc/desc.",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(response="200", description="List of the users.", @OA\JsonContent())
     * )
     *
     * @OA\Get(
     *     path="/users/query?filter_online=false",
     *     tags={"Users"},
     *     description="Get filterd users.",
     *     @OA\Response(response="200", description="List of the users.", @OA\JsonContent()),
     * )
     */
    function getUsers(Request $request){
        $usersCollection = collect($this->users);
        $filters = collect([]);
        $search = $request->input('search');
        $currentPage = $request->input('page') ? $request->input('page') : 1;
        $itemPerPage = $request->input("items_per_page") ? $request->input("items_per_page") : 10;
        $sortLabel = $request->input("sort");
        $order = $request->input("order");
        foreach ($this->properties as $value) {
            $filterValue = $request->input("filter_".$value);
            if($filterValue){
                if($value === 'online' || $value === 'two_steps'){
                    $filters[$value] = $filterValue === 'true' ? true : false;
                } else {
                    $filters[$value] = $filterValue;
                }
            }
        }
    
        if($order === "desc"){
            $usersCollection = $usersCollection->sortByDesc($sortLabel);
        } else {
            $usersCollection = $usersCollection->sortBy($sortLabel);
        }

    
        foreach ($filters as $key => $item) {
            $usersCollection = $usersCollection->where($key, $item);
        }

        $paginatedUsers = $this->paginate($usersCollection, $itemPerPage)->toArray();;

        return response([
            "data" => [
                "users" => $paginatedUsers["data"],
                "pagination"=>[
                    "page"=> $paginatedUsers["current_page"],
                    "first_page_url"=> $paginatedUsers["first_page_url"],
                    "from"=> $paginatedUsers["from"],
                    "last_page"=> $paginatedUsers["last_page"],
                    "links"=> $paginatedUsers["links"],
                    "next_page_url"=> $paginatedUsers["next_page_url"],
                    "items_per_page"=> $paginatedUsers["per_page"],
                    "prev_page_url"=> $paginatedUsers["prev_page_url"],
                    "to"=> $paginatedUsers["to"],
                    "total"=> $paginatedUsers["total"]
            ]]
        ], 200);
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage)->values()->all(), $items->count(), $perPage, $page, $options);
    }
}
