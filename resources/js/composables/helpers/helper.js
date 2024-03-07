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



    return {
        formatDate,
        leadingZeros,
        fromNow,
        currentUser
    }
}
