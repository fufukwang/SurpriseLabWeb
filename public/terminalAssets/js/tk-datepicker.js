(function($) {
    $.fn.extend({
        tkdatepicker: function(obj) {
            function isInViewport(child) {
                const parentRect = document.querySelector('.tk-datepicker-body').getBoundingClientRect();
                const childRect = child.getBoundingClientRect();
            
                return (
                    childRect.top >= parentRect.top &&
                    childRect.bottom <= parentRect.bottom &&
                    childRect.left >= parentRect.left &&
                    childRect.right <= parentRect.right
                );
            };
            
            function setMonthHeader() {
                var months = [];
                for(var i=0; i<document.querySelectorAll('.tk-datepicker .grid').length; i++) {
                    var grid = document.querySelectorAll('.tk-datepicker .grid')[i];
                    if (isInViewport(grid)) {
                        var date = grid.getAttribute('data-date');
                        if (date && date !== '') {
                            var month = parseInt(date.split('-')[1]) - 1;
                            if (months.indexOf(month) < 0) {
                                months.push(month);
                            }
            
                            // 整個月都沒開放，顯示（尚未開放）
                            var html = monthsText[months[0]];
                            if (!openMonth[months[0]]) {
                                html += '<small>（尚未開放場次）</small>'
                            }
                            document.querySelector('.tk-datepicker-month-curr').innerHTML = html;
            
                            if (months.length > 1) {
                                document.querySelector('.tk-datepicker-month-next').style.display = 'block';
                                document.querySelector('.tk-datepicker-month-slash').style.display = 'block';
            
                                var html = monthsText[months[1]];
                                if (!openMonth[months[1]]) {
                                    html += '<small>（尚未開放場次）</small>'
                                }
                                document.querySelector('.tk-datepicker-month-next').innerHTML = html;
                            } else {
                                document.querySelector('.tk-datepicker-month-next').innerText = '';
                                document.querySelector('.tk-datepicker-month-next').style.display = 'none';
                                document.querySelector('.tk-datepicker-month-slash').style.display = 'none';
                            }
                        }
                    }
                }
            }

            var monthsText = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            var openMonth = {};

            var startYear = obj.startYear;
            var startMonth = obj.startMonth;
            var allowDates = obj.allowDates;

            var endYear = startYear;
            var endMonth = startMonth + 2;
            if (endMonth > 12) {
                endMonth = endMonth % 12;
                endYear += 1;
            }
            var endMonthDays = new Date(endYear, endMonth+1, 0).getDate();
            var startDate = new Date(startYear, startMonth, 1);
            // var endDate = new Date(endYear, endMonth, endMonthDays);
            var endDate = new Date(2025, 3, 30);
            var dates = [startDate];
            var date = new Date(startYear, startMonth, 1);

            // var openIdx = 0;
            var lastDay = new Date(startYear, startMonth+1, 0).getDate();
            while(date < endDate) {
                var d = new Date(date.setDate(date.getDate() + 1));
                if ( d.getDate() === 1 ) {
                    // openIdx++;
                    openMonth[d.getMonth()] = false;
                    lastDay = new Date(d.getFullYear(), d.getMonth()+1, 0).getDate();
                }

                if ( d.getDate() >=1 && d.getDate() <= lastDay && allowDates.indexOf( formatedDate(d) ) >= 0 ) {
                    openMonth[d.getMonth()] = true;
                }
                
                dates.push(d);
            }

            // 取當月第一天是星期幾
            // console.log('取當月第一天是星期幾', startDate.getDay());
            
            // 前面要塞幾個空格
            var emptyAmount = startDate.getDay() % 7;
            // console.log('前面要塞幾個空格', emptyAmount);
            
            for(var i=1; i<=emptyAmount; i++) {
                dates.unshift(null);
            }
            
            function chunk(arr, size) {
                return Array.from({ length: Math.ceil(arr.length / size) }, function(v, i) {
                    return arr.slice(i * size, i * size + size);
                });
            }
            
            function formatedDate(date) {
                var year = date.getFullYear();
                var month = (date.getMonth() + 1) < 10 ? ('0' + (date.getMonth() + 1)) : (date.getMonth() + 1);
                var day = date.getDate() < 10 ? ('0' + date.getDate()) : date.getDate();
                return  year + '-' + month + '-' + day;
            }
            
            var chunks = chunk(dates, 7);
            // console.log(chunks);
            
            var html = '';
            var triggerIdx = 0;
            
            for(var w=0; w<chunks.length; w++) {
                var days = chunks[w].map(function(d) {
                    return d ? d.getDate() : d;
                });
            
                if (days.indexOf(1) >= 0) {
                    html += '<div class="trigger" data-idx="'+triggerIdx+'"></div>';
                    triggerIdx++;
                }
            
                html += '<div class="line">';
            
                for(var d=0; d<chunks[w].length; d++) {
                    if (!chunks[w][d]) {
                        html += '<div class="grid" data-date=""></div>';
                    } else {
                        html += '<div class="grid" data-date="'+formatedDate(chunks[w][d])+'">'+chunks[w][d].getDate()+'</div>';
                    }
                }
            
            html += '</div>';
            }
            
            document.querySelector('.tk-datepicker-body').innerHTML = html;

            document.querySelector('.tk-datepicker-body').addEventListener('scroll', function() {
                setMonthHeader();
            });
            
            setMonthHeader();

            obj.onInit( this );
        },
    });
})(jQuery);