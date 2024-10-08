<div class="select-quantity">
    <h5>Items Price Calculator</h5>
    <div class="quantityBox">
        <div class="optFilter">

            <div style="display: flex;flex-wrap: wrap; gap:8px; margin-bottom: 10px;">
                <div class="quantity-container QuanCont">
                    <span class="quantity-label">Quantity</span>
                    <div class="quantity-controls">
                        <button class="quantity-btn minus-btn">−</button>
                        <input type="text" class="quantity-input" name="f3" id="f3" value="1" readonly>
                        <button class="quantity-btn plus-btn">+</button>
                    </div>
                    <input type="hidden" id="d3" name="d3" value="{{ ($productt->blank_price)? $productt->blank_price : 0 }}">
                    <input type="hidden" id="e3" name="e3" value="{{ ($productt->weight)? $productt->weight : 0 }}">
                </div>

                <div class="custom-select">
                    <select id="i3" name="i3" class="i3">
                        <option value="">Select Side Embroidery </option>
                        <option value="yes">Yes</option>
                        <option selected value="no">No</option>
                    </select>
                </div>
                <div class="custom-select side_location" style="display:none">
                    <select id="j3" name="j3" class="j3" onchange="constantCalculation()">
                        <option value="">Select Side Embroidery Locations </option>
                        <option value="right">Right</option>
                        <option value="left">Left</option>
                        <option value="both">Both</option>
                        <option value="na">NA (No side embroidery)</option>
                    </select>
                </div>
            </div>
            <div style="display: flex;flex-wrap: wrap; gap:8px; ">
                <div class="custom-select">
                    <select id="h3" name="h3" class="h3" onchange="constantCalculation()">
                        <option value="">Select Front Embroidery</option>
                        <option selected value="front-center">Front Center</option>
                        <option value="front-left">Front Left Panel</option>
                        <option value="front-right">Front Right Panel</option>
                    </select>
                </div>
                <!-- ----------------------- -->
                <div class="custom-select">
                    <select id="k3" name="k3" class="k3">
                        <option value="">Select Back Embroidery </option>
                        <option value="yes">Yes</option>
                        <option selected value="no">No</option>
                    </select>
                </div>
                <div class="custom-select back_location" style="display:none">
                    <select id="l3" name="l3" class="l3" onchange="constantCalculation()">
                        <option value="">Select Back Embroidery Locations </option>
                        <option value="center">Center</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                        <option value="na">NA (No back embroidery)</option>
                    </select>
                </div>
            </div>
            <div style="display: flex;flex-wrap: wrap; gap:8px; margin-top: 10px;">
                <div class="custom-select">
                    <select id="g3" name="g3" class="g3" onchange="constantCalculation()">
                        <option value="">Select Embroidery Type</option>
                        <option selected value="regular">Regular</option>
                        <option value="3D">3D</option>

                    </select>
                </div>

            </div>

        </div>
        <div class="estPrice price" style="max-height:90px;">

            <p>Estimated price</p>
            <h3>$19/ <span>per cap</span></h3>
        </div>
    </div>
</div>