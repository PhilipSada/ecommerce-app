<?php $__env->startSection('title', 'Your Shopping Cart'); ?> 
<?php $__env->startSection('data-page-id','cart'); ?>
<?php $__env->startSection('stripe-checkout'); ?>
<script src="https://checkout.stripe.com/checkout.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="product">
  
    <div class="shopping_cart" id="shopping_cart" v-cloak>
      

      <div class="text-center" style="margin-top:4rem;">
        <i v-show="loading" class="fa fa-spinner fa-spin" style="font-size:3rem; padding-bottom:3rem; position:fixed; top:60%; bottom:20%; color:black;"></i>
      </div>
      
      <div class="items" v-if="loading==false">
          <div class="grid-x">
            <div class='cell small-12 medium-12'>
                <div class="notify"></div>
                <div v-if="fail" class="cart-text">
                    <h2 v-text="message"></h2>
                    <p> Once you have something in the cart, your items will appear here. Ready to start shopping?</p>
                    <a href="/">Get started </a>
                </div>
                <div v-else>
                    <div>
                        <h2>Your Cart</h2>
                        <table class='hover unstriped' data-form="deleteForm">
                            
                                <thead class="text-left">
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Unit Price</th>
                                        <th>Unit Quantity</th>
                                        <th>Unit Total</th>
                                        <th width='70'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-cloak v-for = "item in items">
                                        <td class="medium-text-center">
                                            <a :href="'/product/' + item.id">
                                                <img :src= "'/' + item.image" height="60px" width="60px">
                                            </a>
                                        </td>
                                        <td>
                                            <h5><a :href="'/product/' + item.id">{{item.name}} </a></h5> 
                                            Status: 
                                            <span v-if='item.stock > 1' style="color:green">In Stock</span>
                                            <span v-else style="color:red">Out of Stock</span>
                                        </td>
                                        <td>${{item.price}}</td> 
                                        <td>
                                            {{item.quantity}}
                                            <button v-if="item.stock > item.quantity" style="cursor:pointer;" v-on:click="updateQuantity(item.id, '+')">
                                                <i class="fa fa-plus-square" aria-hidden="true"></i>
                                            </button>
                                            <button v-if="item.quantity > 1"style="cursor:pointer;" v-on:click="updateQuantity(item.id, '-')">
                                                <i class="fa fa-minus-square" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                        <td>${{item.totalPrice}}</td>
                                        <td width='70' class='medium-text-center'>
                                            <button v-on:click="removeItem(item.index)"style="cursor:pointer;"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <table>
                            <tr>
                                <td valign="top">
                                    <div class ="input-group">
                                        <input type="text" name="coupon" class="input-group-field" placeholder="coupon-code">
                                        <div class="input-group-button ">
                                            <button class="button" style="background-color:rgba(0, 0, 0, 0.89);">Apply</button>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <table class="unstriped">
                                        <tr>
                                            <td><h6>Subtotal:</h6> </td>
                                            <td class="text-right"><h6>${{cartTotal}}</h6></td>
                                        </tr>
                                        <tr>
                                            <td><h6>Discount Amount:</h6></td>
                                            <td class="text-right"><h6>$0.00</h6></td>
                                        </tr>
                                        <tr>
                                            <td><h6>Tax:</h6> </td>
                                            <td class="text-right"> <h6>$0.00</h6></td>
                                        </tr>
                                        <tr>
                                            <td><h6>Total:</h6></td>
                                            <td class="text-right"><h6>${{cartTotal}}</h6></td>
                                        </tr>
                                    </table>
                            </td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <a href="/" class="button secondary"> Continue Shopping &nbsp;<i class="fa fa-shopping-cart" aria-hidden="true"></i> </a> 
                            <button class="button success" @click.prevent="checkout" v-if="authenticated"> Checkout &nbsp; <i class="fa fa-credit-alt"></i></button> 
                            <span v-else>
                                <a href="/login" class="button success">
                                    Checkout &nbsp; <i class="fa fa-credit-alt"></i>
                                </a>
                            </span> 
                            <span id="properties" class="hide" data-customer-email="<?php echo e(user()->email); ?>" 
                                data-stripe-key="<?php echo e(\App\Classes\Session::get('publishable_key')); ?>">
                            
                            </span>                 
                            
                        </div>

                   </div>
                </div>
            </div>

          </div>

      </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\sada_\Downloads\xampp program\htdocs\ecommerce\resources\views/cart.blade.php ENDPATH**/ ?>