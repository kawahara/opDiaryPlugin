<?php

/**
 * This file is part of the OpenPNE package.
 * (c) OpenPNE Project (http://www.openpne.jp/)
 *
 * For the full copyright and license information, please view the LICENSE
 * file and the NOTICE file that were distributed with this source code.
 */

class Diary extends BaseDiary
{
  protected $previous, $next;

  public function getTitleAndCount($space = true)
  {
    return sprintf('%s%s(%d)',
             $this->getTitle(),
             $space ? ' ' : '',
             $this->countDiaryComments()
           );
  }

  public function getPublicFlagLabel()
  {
    $publicFlags = DiaryPeer::getPublicFlags();
    return $publicFlags[$this->getPublicFlag()];
  }

  public function getDiaryCommentsCriteria()
  {
    $criteria = new Criteria();
    $criteria->add(DiaryCommentPeer::DIARY_ID, $this->getId());

    return $criteria;
  }

  public function getPrevious()
  {
    if (is_null($this->previous))
    {
      $criteria = new Criteria();
      $criteria->add(DiaryPeer::MEMBER_ID, $this->getMemberId());
      $criteria->add(DiaryPeer::ID, $this->getId(), Criteria::LESS_THAN);
      $criteria->addDescendingOrderByColumn(DiaryPeer::ID);

      $this->previous = DiaryPeer::doSelectOne($criteria);
    }

    return $this->previous;
  }

  public function getNext()
  {
    if (is_null($this->next))
    {
      $criteria = new Criteria();
      $criteria->add(DiaryPeer::MEMBER_ID, $this->getMemberId());
      $criteria->add(DiaryPeer::ID, $this->getId(), Criteria::GREATER_THAN);
      $criteria->addAscendingOrderByColumn(DiaryPeer::ID);

      $this->next = DiaryPeer::doSelectOne($criteria);
    }

    return $this->next;
  }
}
