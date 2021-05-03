<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Bedfurniture;
use App\Models\Livingfurniture;
use App\Models\Kitchenfurniture;
use App\Models\Babyfurniture;
use App\Models\Lobbyfurniture;
use App\Models\Offisefurniture;
use App\Models\Bathfurniture;
use App\Models\Cart;
use App\Models\Order;
use App\Http\Requests;
use Session;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;



class ServicesController extends Controller
{
    public function index(){
        return view("mainPage.services");
    }

    public function livingroomFur(){

        $living_furnitures = Livingfurniture::all();
        return view("mainPage.furPages.livingroom", compact('living_furnitures'));

    }

    public function bedroomFur(){

        $bed_furnitures = Bedfurniture::all();
        return view("mainPage.furPages.bedroom", compact('bed_furnitures'));

    }

    public function kitchenFur(){

        $kitchen_furnitures = Kitchenfurniture::all();
        return view("mainPage.furPages.kitchen", compact('kitchen_furnitures'));

    }

    public function babyroomFur(){

        $baby_furnitures = Babyfurniture::all();
        return view("mainPage.furPages.babyroom", compact('baby_furnitures'));

    }

    public function lobbyFur(){

        $lobby_furnitures = Lobbyfurniture::all();
        return view("mainPage.furPages.lobby", compact('lobby_furnitures'));

    }

    public function offiseFur(){

        $offise_furnitures = Offisefurniture::all();
        return view("mainPage.furPages.offise", compact('offise_furnitures'));

    }

    public function bathroomFur(){

        $bath_furnitures = Bathfurniture::all();
        return view("mainPage.furPages.bathroom", compact('bath_furnitures'));

    }


    public function bedroomShow($id){

        $bedfurniture = Bedfurniture::find($id);
        return view('mainPage.furPages.bedroomShow', compact('bedfurniture'));

    }

    public function livingroomShow($id){

        $livingfurnitures = Livingfurniture::find($id);
        return view('mainPage.furPages.livingroomShow', compact('livingfurnitures'));

    }

    public function kitchenShow($id){

        $kitchenfurnitures = Kitchenfurniture::find($id);
        return view('mainPage.furPages.kitchenShow', compact('kitchenfurnitures'));

    }

    public function babyroomShow($id){

        $babyfurniture = Babyfurniture::find($id);
        return view('mainPage.furPages.babyroomShow', compact('babyfurniture'));

    }

    public function lobbyShow($id){

        $lobbyfurnitures = Lobbyfurniture::find($id);
        return view('mainPage.furPages.lobbyShow', compact('lobbyfurnitures'));

    }

    public function OffiseShow($id){

        $offisefurnitures = Offisefurniture::find($id);
        return view('mainPage.furPages.offiseShow', compact('offisefurnitures'));

    }

    public function bathroomShow($id){

        $bathfurniture = Bathfurniture::find($id);
        return view('mainPage.furPages.bathroomShow', compact('bathfurniture'));

    }

    public function send_message(){

    }

    public function views_count(Request $request, $id){
        $name = $request->get('name');
        $modelName = "App\Models\\$name"; // assuming model is located in the App namespace
        $model = new $modelName();

       
        $post = $model::find($id);
        $value = $post->views;
        $post->views = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
        
    }

    public function like(Request $request, $id){
        $name = $request->get('name');
        $modelName = "App\Models\\$name"; 
        $model = new $modelName();

       
        $like_count = $model::find($id);
        $value = $like_count->likes;
        $like_count->likes = $value+1;
        $like_count->save();
        return response()->json($like_count);
    }
   

    public function disLike(Request $request, $id){
        $name = $request->get('name');
        $modelName = "App\Models\\$name";
        $model = new $modelName();

       
        $dislike_count = $model::find($id);
        $value = $dislike_count->likes;
        $dislike_count->likes = $value-1;
        $dislike_count->save();
        return response()->json($dislike_count);
    }

    public function getAddToCart(Request $request, $id){
        $name = $request->get('name');
        $modelName = "App\Models\\$name";
        $model = new $modelName();

        $product = $model::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        
        $count = $request->session()->put('cart', $cart);
        return response()->json($count);
        
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('mainPage.shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('mainPage.shop.shoppingCart', ['products'=> $cart->items, 'totalPrice'=> $cart->totalPrice]);
    }

    public function getCheckout(){
        if(!Session::has('cart')){
            return view('mainPage.shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        
        return view('mainPage.shop.checkout', compact('total'));
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
            return view('mainPage.shop.shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        
        
        Stripe::setApiKey('sk_test_51Il8gNBpoVh2ifCIlQyBm2h7Dvl1opXsIrs83I0EjZz4D7v2saiTEOhNE3ytgRRlQM8nAsjVc40TdWm9XPu1mo4W00uTND0cYI');
        
        
    
        try{
            
            $customer = Customer::create(array(
                'source'  => $request->stripeToken,
                'email' => $request->name,
                'description' => "test"
            ));


        

            $charge = Charge::create(array(
                 
                "customer" => $customer->id,
                "amount" => $cart->totalPrice * 1,
                "currency" => "usd",
                "description" => "Test Charge"
            ));
           
            

        }catch(\Exception $e){
            return redirect()->route('product.shoppingCart')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('base')->with('success', 'Succesfully purchashed products');
        
    }
}
