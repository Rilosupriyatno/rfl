'use strict';

export function shipmentModal({
  container,
  title,
  costData,
  cartDetail,
  buyerDetail,
}) {
  // get object from cost data
  const { name, costs } = costData;
  // shipping list fee
  const shippingEstimate = [];
  const shippingService = [];
  const shippingFeeList = [];
  // make a modal content
  let modalContent = '';

  modalContent += `
    <div class="bg-transparent invisible w-full h-screen fixed bottom-0 left-0 transition-all" id="modal-${title}">
      <div class="hidden w-full h-full z-10" id="modal-overlay-${title}"></div>
      <div class="absolute w-full max-w-rattan-mobile bottom-0 left-1/2 -translate-x-1/2 translate-y-[40rem] bg-white rounded-tl-2xl rounded-tr-2xl flex flex-col gap-5 pt-4 z-50 transition-transform duration-300" id="modal-content-${title}">
          <div class="flex items-center px-6 gap-4">
              <a href="javascript:;" class="text-[3rem] leading-none" modal-dismiss="modal-close">&times;</a>
              <h2 class="text-[1.2rem] font-bold mt-[0.5rem]">Pilih Pengiriman</h2>
          </div>
          <div class="modal-body-${title} h-100">
              <ul class="flex flex-col">
  `;

  // make the lists of costs
  costs.forEach((costList, index) => {
    // get the data
    const { cost, description, service } = costList;
    const { value, etd, note } = cost[0];

    // support variable
    let dayMonthYearETD = [];

    // split the etd
    const splitETD = etd.split('-');
    // manipulate the etd + today's date then returning back to arr
    const estimateArray = splitETD.map((etd, i) => {
      // formatter
      const monthFormat = new Intl.DateTimeFormat('en-US', {
        month: 'short',
      });
      // estimate days
      const estimateDays = new Date(Date.now());

      // avoid "HARI" in string
      if (etd.toLowerCase().includes('hari')) {
        etd = etd.split(' ').at(0);
      }

      // increment the now day with etd day
      estimateDays.setDate(+etd + estimateDays.getDate());

      // split into date + month string format
      const date = estimateDays.getDate();
      const month = monthFormat.format(estimateDays);
      const year = estimateDays.getFullYear();
      const dateMonth = `${date} ${month}`;
      const dateMonthYear = `${date} ${month} ${year}`;

      dayMonthYearETD.push(dateMonthYear);

      return dateMonth;
    });

    // join them with '-'
    const estimateStringFormat =
      estimateArray.length > 1
        ? estimateArray.join(' - ')
        : estimateArray.join('');

    // change the format into rupiah
    const valueRupiahFormat = `Rp. ${value
      .toString()
      .replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;

    modalContent += `
      <li class="shipment-list flex items-center justify-between border-b-2 px-6 py-4 cursor-pointer transition-all hover:bg-gray-200">
          <a href="javascript:;">
              <span class="text-[1.2rem] font-bold">${service} - ${description} (${valueRupiahFormat})</span>
              <p class="text-[#767676]">Estimasi tiba ${estimateStringFormat}</p>
              ${
                note !== ''
                  ? `<p class="text-[#767676]">*note: ${note}</p>`
                  : ''
              }
          </a>
      </li>
    `;

    // push the value (shipping estimate time)
    shippingEstimate.push({
      row: index + 1,
      estimate_day: dayMonthYearETD,
    });

    // push the value (shipping service)
    shippingService.push({
      row: index + 1,
      service: `${service} - ${description}`,
    });

    // push the value (amount of shipping fee)
    shippingFeeList.push({
      row: index + 1,
      amount: value,
    });
  });

  modalContent += `
            </ul>
          </div>
      </div>
    </div>
  `;

  // check the current modal
  const currModal = document.getElementById(`modal-${title}`);

  // if not null then remove the old one
  if (currModal !== null) {
    currModal.remove();
  }

  // insert the element
  container.insertAdjacentHTML('afterend', modalContent);

  // after the modal is inserted, then return the data
  const shipmentData = [];
  const { cartId, cartWeight } = cartDetail;
  const { buyerAddress } = buyerDetail;
  const splitCartId = cartId.split(',');

  splitCartId.forEach((id, index) => {
    shipmentData.push({
      order_detail_id: id,
      shipping_name: name,
      shipping_number: null,
      shipping_address: buyerAddress,
      billing_address: buyerAddress,
      shipping_weight: cartWeight,
      shipping_fee: shippingFeeList,
      shipping_services: shippingService,
      shipping_estimate: shippingEstimate,
    });
  });

  return shipmentData;
}
