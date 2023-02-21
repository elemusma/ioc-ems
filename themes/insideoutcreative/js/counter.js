let data = document.querySelectorAll(".counter")
let dataArray = Array.from(data)

dataArray.map((data) => {
    let count = 0
    let counterUp = () => {
        count++
        data.innerHTML = count
        if (count == data.dataset.number) {
            clearInterval(stopInterval)
        }
    }
    let stopInterval = setInterval(counterUp, 30)
})

let dataLarge = document.querySelectorAll(".counter-large")
let dataArrayLarge = Array.from(dataLarge)

dataArrayLarge.map((dataLarge) => {
    let count = 0
    let counterUp = () => {
        count += 2000
        dataLarge.innerHTML = count
        if (count == dataLarge.dataset.number) {
            clearInterval(stopInterval)
        }
    }
    let stopInterval = setInterval(counterUp, 30)
})



// const counterUp = window.counterUp.default

// const callback = entries => {
//     entries.forEach(entry => {
//         const el = entry.target
//         if (entry.isIntersecting && !el.classList.contains('is-visible')) {
//             counterUp(el, {
//                 duration: 3500,
//                 delay: 16,
//             })
//             el.classList.add('is-visible')
//         }
//     })
// }

// const IO = new IntersectionObserver(callback, { threshold: 1 })

// const el = document.querySelector('.counter')
// IO.observe(el)

// $(".counter").counter({
//     autoStart: false,           // true/false, default: true
//     duration: 5000,             // milliseconds, default: 1500
//     countFrom: 10,              // start counting at this number, default: 0
//     countTo: 30,                // count to this number, default: 0
//     runOnce: true,              // only run the counter once, default: false
//     placeholder: "?",           // replace the number with this before counting,
//     // most useful with autoStart: false. default: undefined
//     easing: "easeOutCubic",     // see http://gsgd.co.uk/sandbox/jquery/easing
//     // for all available effects, see visual examples:
//     // http://easings.net
//     // default: "easeOutQuad"
//     onStart: function () { },     // callback on start of the counting
//     onComplete: function () { },  // callback on completion of the counting
//     numberFormatter:            // function used to format the displayed numbers.
//         function (number) {
//             return "$ " + number;
//         }
// });

// function customCounter () {
// $('.counter').counter({
//     // delay: 10,
//     time: 2000
// });
// 	$('.counter-01').counterUp({
// 		delay: 10,
// 		time: 3000
// 	  });
// }

// customCounter();



// (function ($) {
// 	$.fn.countTo = function (options) {
// 		options = options || {};

// 		return $(this).each(function () {
// 			// set options for current element
// 			var settings = $.extend({}, $.fn.countTo.defaults, {
// 				from:            $(this).data('from'),
// 				to:              $(this).data('to'),
// 				speed:           $(this).data('speed'),
// 				refreshInterval: $(this).data('refresh-interval'),
// 				decimals:        $(this).data('decimals')
// 			}, options);

// 			// how many times to update the value, and how much to increment the value on each update
// 			var loops = Math.ceil(settings.speed / settings.refreshInterval),
// 				increment = (settings.to - settings.from) / loops;

// 			// references & variables that will change with each update
// 			var self = this,
// 				$self = $(this),
// 				loopCount = 0,
// 				value = settings.from,
// 				data = $self.data('countTo') || {};

// 			$self.data('countTo', data);

// 			// if an existing interval can be found, clear it first
// 			if (data.interval) {
// 				clearInterval(data.interval);
// 			}
// 			data.interval = setInterval(updateTimer, settings.refreshInterval);

// 			// initialize the element with the starting value
// 			render(value);

// 			function updateTimer() {
// 				value += increment;
// 				loopCount++;

// 				render(value);

// 				if (typeof(settings.onUpdate) == 'function') {
// 					settings.onUpdate.call(self, value);
// 				}

// 				if (loopCount >= loops) {
// 					// remove the interval
// 					$self.removeData('countTo');
// 					clearInterval(data.interval);
// 					value = settings.to;

// 					if (typeof(settings.onComplete) == 'function') {
// 						settings.onComplete.call(self, value);
// 					}
// 				}
// 			}

// 			function render(value) {
// 				var formattedValue = settings.formatter.call(self, value, settings);
// 				$self.html(formattedValue);
// 			}
// 		});
// 	};

// 	$.fn.countTo.defaults = {
// 		from: 0,               // the number the element should start at
// 		to: 0,                 // the number the element should end at
// 		speed: 1000,           // how long it should take to count between the target numbers
// 		refreshInterval: 100,  // how often the element should be updated
// 		decimals: 0,           // the number of decimal places to show
// 		formatter: formatter,  // handler for formatting the value before rendering
// 		onUpdate: null,        // callback method for every time the element is updated
// 		onComplete: null       // callback method for when the element finishes updating
// 	};

// 	function formatter(value, settings) {
// 		return value.toFixed(settings.decimals);
// 	}
// }(jQuery));

// jQuery(function ($) {
//   // custom formatting example
//   $('.aos-animate .count-number').data('countToOptions', {
// 	formatter: function (value, options) {
// 	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
// 	}
//   });

//   // start all the timers
//   $('.aos-animate .timer').each(count);  

//   function count(options) {
// 	var $this = $(this);
// 	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
// 	$this.countTo(options);
//   }
// });

// console.log('hello');