<?php
/**
 * @copyright Copyright (c) 2014 X.commerce, Inc. (http://www.magentocommerce.com)
 */

namespace Magento\User\Test\Constraint;

use Magento\User\Test\Page\Adminhtml\UserEdit;
use Mtf\Constraint\AbstractConstraint;

/**
 * Class AssertUserDuplicateMessage
 */
class AssertUserDuplicateMessage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    const ERROR_MESSAGE = 'A user with the same user name or email already exists.';

    /**
     * Asserts that error message equals to expected message.
     *
     * @param UserEdit $userEdit
     * @return void
     */
    public function processAssert(UserEdit $userEdit)
    {
        $failedMessage = $userEdit->getMessagesBlock()->getErrorMessages();
        \PHPUnit_Framework_Assert::assertEquals(
            self::ERROR_MESSAGE,
            $failedMessage,
            'Wrong success message is displayed.'
            . "\nExpected: " . self::ERROR_MESSAGE
            . "\nActual: " . $failedMessage
        );
    }

    /**
     * Returns success message if assert true.
     *
     * @return string
     */
    public function toString()
    {
        return 'Error message on creation user page is correct.';
    }
}
