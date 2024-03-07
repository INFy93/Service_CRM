import dayjs from 'dayjs';
import localizedFormat from 'dayjs/plugin/localizedFormat';
import ru from 'dayjs/locale/ru';
import relativeTime from 'dayjs/plugin/relativeTime'
export default function useHelpers()
{
    dayjs.extend(localizedFormat);
    dayjs.extend(relativeTime);
    dayjs.locale(ru);

    const currentUser = window.User;
    function formatDate(date, format="DD/MM/YYYY")
    {
        return dayjs(date).format(format)
    }

    function fromNow(date)
    {
        return dayjs(date).fromNow();
    }

    function leadingZeros(value) {
        return value.toString().padStart(5, "0");
    }

    function nicePhone(phone) {
        let lenPhone = phone.length;
        let tt = phone.split("");
        if (lenPhone === 12) {
            tt.splice(2, "", " (");
            tt.splice(6, "", ") ");
            tt.splice(10, "", "-");
            tt.splice(13, "", "-");
        } else if (lenPhone === 13) {
            tt.splice(3, "", " (");
            tt.splice(7, "", ") ");
            tt.splice(11, "", "-");
            tt.splice(14, "", "-");
        }
        return tt.join("");
    }


    return {
        formatDate,
        leadingZeros,
        fromNow,
        nicePhone,
        currentUser
    }
}
