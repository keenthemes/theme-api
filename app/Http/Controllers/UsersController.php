<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

/**
 * @OA\Info(
 *     title="Project",
 *     version="1.0.0"
 * )
 */
class UsersController extends Controller
{
    public $users;
    public $properties = ["id", "name", "email", "position", "online"];

    function __construct() {
        $this->users = [
            [
                'id' => 1,
                'name' => 'Emma Smith', 
                'avatar' => 'avatars/300-6.jpg', 
                'email' => 'e.smith@kpmg.com.au', 
                'position' => 'Art Director',
                "online" => false
            ],
            [
                'id' => 2,
                'name' => 'Melody Macy', 
                'initials' => ['label' => 'M', 'state' => 'danger'],
                'email' => 'melody@altbox.com', 
                'position' => 'Marketing Analytic',
                "online" => false
            ],        
            [
                'id' => 3,
                'name' => 'Max Smith', 
                'avatar' => 'avatars/300-1.jpg', 
                'email' => 'max@kt.com', 
                'position' => 'Software Enginer',
                "online" => false
            ],    
            [
                'id' => 4,
                'name' => 'Sean Bean', 
                'avatar' => 'avatars/300-5.jpg', 
                'email' => 'sean@dellito.com', 
                'position' => 'Web Developer',
                "online" => false
            ],
            [
                'id' => 5,
                'name' => 'Brian Cox', 
                'avatar' => 'avatars/300-25.jpg', 
                'email' => 'brian@exchange.com', 
                'position' => 'UI/UX Designer',
                "online" => false
            ],
            [
                'id' => 6,
                'name' => 'Melody Macy', 
                'initials' => ['label' => 'C', 'state' => 'warning'],
                'email' => 'mikaela@pexcom.com', 
                'position' => 'Head Of Marketing',
                "online" => true
            ],
            [
                'id' => 7,
                'name' => 'Francis Mitcham', 
                'avatar' => 'avatars/300-9.jpg', 
                'email' => 'f.mitcham@kpmg.com.au', 
                'position' => 'Software Arcitect',
                "online" => false
            ],
            [
                'id' => 8,
                'name' => 'Melody Macy', 
                'initials' => ['label' => 'O', 'state' => 'danger'],
                'email' => 'olivia@corpmail.com', 
                'position' => 'System Admin',
                "online" => true
            ],
            [
                'id' => 9,
                'name' => 'Neil Owen', 
                'initials' => ['label' => 'N', 'state' => 'primary'],
                'email' => 'owen.neil@gmail.com', 
                'position' => 'Account Manager',
                "online" => true
            ],
            [
                'id' => 10,
                'name' => 'Dan Wilson', 
                'avatar' => 'avatars/300-23.jpg', 
                'email' => 'dam@consilting.com', 
                'position' => 'Web Desinger',
                "online" => false
            ],
            [
                'id' => 11,
                'name' => 'Emma Bold', 
                'initials' => ['label' => 'E', 'state' => 'danger'],
                'email' => 'emma@intenso.com', 
                'position' => 'Corporate Finance',
                "online" => true
            ],
            [
                'id' => 12,
                'name' => 'Ana Crown', 
                'avatar' => 'avatars/300-12.jpg', 
                'email' => 'ana.cf@limtel.com', 
                'position' => 'Customer Relationship',
                "online" => false
            ],
            [
                'id' => 13,
                'name' => 'Robert Doe', 
                'initials' => ['label' => 'A', 'state' => 'info'],
                'email' => 'robert@benko.com', 
                'position' => 'Marketing Executive',
                "online" => true
            ],
            [
                'id' => 14,
                'name' => 'John Miller', 
                'avatar' => 'avatars/300-13.jpg', 
                'email' => 'miller@mapple.com', 
                'position' => 'Project Manager',
                "online" => false
            ],
            [
                'id' => 15,
                'name' => 'Lucy Kunic', 
                'initials' => ['label' => 'L', 'state' => 'success'],
                'email' => 'lucy.m@fentech.com', 
                'position' => 'SEO Master',
                "online" => true
            ],
            [
                'id' => 16,
                'name' => 'Ethan Wilder', 
                'avatar' => 'avatars/300-21.jpg', 
                'email' => 'ethan@loop.com.au', 
                'position' => 'Accountant',
                "online" => true
            ]
            ];
    }

    /**
     * @OA\Get(
     *     path="/api/user/1",
     *     @OA\Response(response="200", description="User with id=1.")
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
            return response("User with id ".$id." is not found.", 404);
        }

        return response($user, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/user/1?name=asdf&avatar=asdfasdf&email=asdfa@asdfas.lv&position=asdfasf",
     *     @OA\Response(response="200", description="User has been successfully added!")
     * )
     */
    function addUser(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255',
            'position'      => 'required|string|max:255',
        ]);

        array_push($request->all());

        return response("User has been successfully added!", 200);
    }

    /**
     * @OA\Put(
     *     path="/api/user/1?name=asdf&avatar=asdfasdf&email=asdfa@asdfas.lv&position=asdfasf",
     *     @OA\Response(response="200", description="Users data has been successfully updated!")
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

        return response("Users data has been successfully updated!", 200);
    }


    /**
     * @OA\Delete(
     *     path="/api/user/1",
     *     @OA\Response(response="200", description="User has been successfully deleted!")
     * )
     */
    function deleteUser($id){
        $usersCollection = collect($this->users);
        foreach($usersCollection as $key => $item){
            if($item['id'] == $id){
                unset($usersCollection[$key]);
            }
        }

        return response("User has been successfully deleted!", 200);
    }

    /**
     * @OA\Get(
     *     path="/api/users/query?page=1",
     *     @OA\Response(response="200", description="User has been successfully deleted!")
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
                if($value === "online"){
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

        return response(["data" => $this->paginate($usersCollection, $itemPerPage)], 200);
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage)->values()->all(), $items->count(), $perPage, $page, $options);
    }
}
