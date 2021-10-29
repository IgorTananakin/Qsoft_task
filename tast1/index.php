<?php
    /**
     * Дано целое число, представленное в виде массива, где каждый элемент
     * является цифрой от 0 до 9.
     * Например, число 10526 представлено как [1, 0, 5, 2, 6].
     * Увеличьте это число на 2 и верните результирующий массив цифр.
     * Доработайте функцию plusTwo.
     *
     * Проверить результат можно просто запустив код. Выведется табличка вида
     * status..........output..........expected_output
     *
     * success.........[1, 1]..........[1, 1].........
     * success.........[9, 0]..........[9, 0].........
     * error...........[1, 2, 6].......[1, 3, 6]......
     * success.........[1, 0, 0, 1]....[1, 0, 0, 1]...
     *
     * При желании можно поменять входные данные ниже.
     *
     * Приводить массив к строке - не лучшее решение
     */

    function plusTwo(array $digits): array {
        echo '<br>';
        //1 один из способов обратится к последнему элементу массива и увеличить его
        $digits[count($digits) - 1] = $digits[count($digits) - 1] + 2;
        //2 способ обратится через функцию array_pop и проделать туже операцию 
        //3 способ не желательный приравнять массив к строке implode. Привести строку к типу int. Увеличить число. 
        // Преобразовать строку в массив str_split.
        return $digits;
    }
   
    show('status', 'output', 'expected_output');
    echo PHP_EOL;
    
    test([9],       [1, 1]);
    test([8, 8],    [9, 0]);
    test([1, 2, 4], [1, 2, 6]);
    test([9, 9, 9], [1, 0, 0, 1]);

    function toString(array $array) {
        return sprintf('[%s]', implode(', ', $array));
    }

    function pad ($str) {
        return str_pad($str, 15, '.');
    }

    function show($first, $second, $third) {
        printf('%s.%s.%s%s', pad($first), pad($second), pad($third), PHP_EOL);
    }

    function test(array $input, array $output) {
        $iString = toString(plusTwo($input));
        $oString = toString($output);

        show(
            $iString === $oString ? 'success' : 'error',
            $iString,
            $oString
        );
    }

   